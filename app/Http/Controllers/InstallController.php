<?php

namespace App\Http\Controllers;

use App\Http\Requests\InstallRequest;
use App\Models\Setting;
use App\Models\User;
use App\Traits\UpdateTrait;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use ZipArchive;

class InstallController extends Controller
{
    use UpdateTrait;

    public function index()
    {
        try {
            return view('install.index');
        } catch (\Exception $e) {

        }
    }

    public function getInstall(InstallRequest $request): \Illuminate\Http\JsonResponse
    {
        ini_set('max_execution_time', 900); //900 seconds
        $host                = $request->host;
        $db_user             = $request->db_user;
        $db_name             = $request->db_name;
        $db_password         = $request->db_password;

        $first_name          = $request->first_name;
        $last_name           = $request->last_name;
        $email               = $request->email;
        $login_password      = $request->password;

        $purchase_code       = $request->purchase_code;

        //check for valid database connection
        try {
            $mysqli = @new \mysqli($host, $db_user, $db_password, $db_name);
        } catch (\Exception $e) {
            return response()->json([
                'error' => __('Please input valid database information.'),
            ]);
        }
        if (mysqli_connect_errno()) {
            return response()->json([
                'error' => __('Please input valid database information.'),
            ]);
        }
        $mysqli->close();

        // validate code

        $data['DB_HOST']     = $host;
        $data['DB_DATABASE'] = $db_name;
        $data['DB_USERNAME'] = $db_user;
        $data['DB_PASSWORD'] = $db_password;

        $verification        = validate_purchase($purchase_code, $data);

        if ($verification === 'success') {
            session()->put('email', $email);
            session()->put('first_name', $first_name);
            session()->put('last_name', $last_name);
            session()->put('login_password', $login_password);
            session()->put('purchase_code', $purchase_code);
            session()->put('re_install', $request->re_install);

            return response()->json([
                'route'   => route('install.finalize'),
                'success' => true,
            ]);
        } elseif ($verification === 'connection_error') {
            return response()->json([
                'error' => __('There is a problem to connect with SpaGreen server.Make sure you have active internet connection!'),
            ]);

        } elseif ($verification === false) {
            return response()->json([
                'error' => __('Something went wrong. Please try again.'),
            ]);

        } else {
            return response()->json([
                'error' => $verification,
            ]);
        }
    }

    public function final()
    {
        try {
            $zip_file    = base_path('public/install/installer.zip');
            if (file_exists($zip_file)) {
                $zip = new ZipArchive;
                if ($zip->open($zip_file) === true) {
                    $zip->extractTo(base_path('/'));
                    $zip->close();
                } else {
                    return response()->json([
                        'error' => 'Installation files Not Found, Please Try Again',
                        'route' => route('install.initialize'),
                    ]);
                }
                unlink($zip_file);
            }

            $config_file = base_path('config.json');
            if (file_exists($config_file)) {
                $config = json_decode(file_get_contents($config_file), true);
            } else {
                return response()->json([
                    'error' => 'Config File Not Found, Please Try Again',
                    'route' => route('install.initialize'),
                ]);
            }

            Artisan::call('migrate:fresh', ['--force' => true]);
            $this->dataInserts($config);
            $this->envUpdates();

            return response()->json([
                'success' => 'Installation was Successful',
                'route'   => url('/'),
            ]);
        } catch (\Exception $e) {
            dd($e);
        }
    }

    protected function dataInserts($config): bool
    {
        $user             = User::find(1);
        $user->email      = Session::get('email');
        $user->first_name = Session::get('first_name');
        $user->last_name  = Session::get('last_name');
        $user->password   = bcrypt(Session::get('login_password'));
        $user->save();

        $code             = Setting::where('title', 'purchase_code')->first();

        if ($code) {
            $code->update([
                'value' => session()->get('purchase_code'),
            ]);
        } else {
            Setting::create([
                'title' => 'purchase_code',
                'value' => session()->get('purchase_code'),
            ]);
        }

        if (isAppMode()) {
            $version_code = $config['app_version_code'];
            $version      = $config['app_version'];
        } else {
            $version_code = $config['web_version_code'];
            $version      = $config['web_version'];
        }

        $code             = Setting::where('title', 'version_code')->first();
        $version_no       = Setting::where('title', 'current_version')->first();

        if ($code) {
            $code->update([
                'value' => $version_code,
            ]);
        } else {
            Setting::create([
                'title' => 'version_code',
                'value' => $version_code,
            ]);
        }

        if ($version_no) {
            $version_no->update([
                'value' => $version,
            ]);
        } else {
            Setting::create([
                'title' => 'current_version',
                'value' => $version,
            ]);
        }

        return true;
    }

    protected function envUpdates(): void
    {
        envWrite('APP_URL', URL::to('/'));
        envWrite('APP_INSTALLED', true);
        Artisan::call('key:generate');
        Artisan::call('all:clear');
    }

    public function releaseForm()
    {
        if (! config('app.dev_mode')) {
            abort(404);
        }

        return view('install.release');
    }

    public function createRelease(Request $request)
    {
        $request->validate([
            'latest_commit' => 'required',
            'old_commit'    => 'required',
            'prefix'        => 'required',
            'version'       => 'required',
        ]);

        try {
            $latest_commit  = $request->latest_commit;
            $old_commit     = $request->old_commit;
            $name           = $request->prefix;
            $version        = $request->version;
            $gitDiffCommand = "git diff --name-only $latest_commit $old_commit";
            $changedFiles   = shell_exec($gitDiffCommand);
            file_put_contents(base_path('release_creator.txt'), $changedFiles);
            $file           = base_path('release_creator.txt');
            $lines          = file($file);
            $data           = [];
            foreach ($lines as $line) {
                $data[] = $line;
            }
            $data           = array_filter($data);
            $data           = array_map('trim', $data);
            $data           = array_filter(array_unique(array_values($data)));
            $zip            = new ZipArchive;
            $release_name   = $name.'_release_v'.$version;
            $zip_file       = base_path("$release_name.zip");
            if ($zip->open($zip_file, ZipArchive::CREATE) === true) {
                foreach ($data as $file) {
                    if (file_exists(base_path($file))) {
                        $zip->addFile(base_path($file), $file);
                    }
                }
                $zip->close();
            }
            $script_url     = str_replace('admin/update-system', '', (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http')."://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");

            $fields         = [
                'domain'        => urlencode($_SERVER['SERVER_NAME']),
                'version'       => $request->latest_version,
                'item_id'       => 47989504,
                'purchase_code' => urlencode(setting('purchase_code')),
                'url'           => urlencode($script_url),
                'is_beta'       => config('app.dev_mode') ? 1 : 0,
            ];

            $request        = curlRequest('https://desk.spagreen.net/verify-installation-v2', $fields);
            $zip_file       = $request->release_zip_link;
            $file_path      = base_path('updater.zip');
            file_put_contents($file_path, file_get_contents($zip_file));
            File::delete([base_path('release_creator.txt'), $file_path]);
            Toastr::success('Release Created Successfully');

            return back();
        } catch (\Exception $e) {
            dd($e);
        }
    }
}
