<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Job;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function store(Request $request, Job $job): JsonResponse
    {
        $data = $request->validate([
            'cover_letter' => ['nullable', 'string'],
            'cv_path' => ['required', 'string', 'max:255'],
        ]);

        $application = Application::query()->updateOrCreate(
            ['user_id' => auth()->id(), 'job_id' => $job->id],
            [...$data, 'status' => 'pending']
        );

        return response()->json($application, 201);
    }

    public function index(): JsonResponse
    {
        $applications = Application::query()->with('job')->where('user_id', auth()->id())->latest()->get();

        return response()->json($applications);
    }
}
