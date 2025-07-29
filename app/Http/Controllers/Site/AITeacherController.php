<?php
namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;

class AITeacherController extends Controller
{
    public function index()
    {
        // Verify configuration
        $config = [
            'api_key' => Config::get('services.heygen.api_key'),
            'avatar_id' => Config::get('services.heygen.avatar_id'),
        ];

        // Log configuration for debugging
        \Log::info('HeyGen Configuration:', array_map(function($value) {
            return $value ? 'Set' : 'Not set';
        }, $config));

        return view('ai-teacher.ai_teacher');
    }
} 