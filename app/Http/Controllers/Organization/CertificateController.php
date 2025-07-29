<?php

namespace App\Http\Controllers\Organization;

use App\DataTables\Organization\CertificateDataTable;
use App\Http\Controllers\Controller;
use App\Repositories\CertificateRepository;
use App\Repositories\CourseRepository;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CertificateController extends Controller
{
    protected $certificateRepository;

    protected $courseRepository;

    public function __construct(CertificateRepository $certificateRepository, CourseRepository $courseRepository)
    {
        $this->certificateRepository = $certificateRepository;
        $this->courseRepository      = $courseRepository;
    }

    public function index(CertificateDataTable $dataTable)
    {
        return $dataTable->render('backend.organization.certificate.index');
    }

    public function edit($id)
    {
        try {
            $course = $this->courseRepository->find($id);
            $data   = [
                'course' => $course,
            ];

            return view('backend.organization.certificate.manage_certificate', $data);
        } catch (\Exception $e) {
            Toastr::error($e->getMessage());

            return back();
        }
    }

    public function update(Request $request, $id)
    {
        if (config('app.demo_mode')) {
            $data = [
                'status' => 'danger',
                'error'  => __('this_function_is_disabled_in_demo_server'),
                'title'  => 'error',
            ];

            return response()->json($data);
        }
        $request->validate([
            'title'                            => 'required',
            'body'                             => 'required',
            'instructor_signature_media_id'    => 'required',
            'administrator_signature_media_id' => 'required',
            'background_image_media_id'        => 'required',
        ], [
            'instructor_signature_media_id.required'    => __('instructor_signature_is_required'),
            'administrator_signature_media_id.required' => __('administrator_signature_is_required'),
            'background_image_media_id.required'        => __('background_image_is_required'),
        ]);

        DB::beginTransaction();
        try {
            $certificate = $this->certificateRepository->findCertificate($id);
            if ($certificate) {
                $this->certificateRepository->update($request->all(), $certificate->id);
            } else {
                $this->certificateRepository->store($request->all());
            }

            Toastr::success(__('update_successful'));

            DB::commit();

            return response()->json([
                'success' => __('create_successful'),
                'route'   => route('organization.certificates.index'),
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
