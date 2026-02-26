<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Job\StoreJobRequest;
use App\Models\Job;
use Illuminate\Http\JsonResponse;

class JobController extends Controller
{
    public function index(): JsonResponse
    {
        $jobs = Job::query()->with('employer')->latest()->paginate(15);

        return response()->json($jobs);
    }

    public function show(Job $job): JsonResponse
    {
        $job->increment('views');

        return response()->json($job->load('employer', 'applications'));
    }

    public function store(StoreJobRequest $request): JsonResponse
    {
        $job = Job::query()->create([
            ...$request->validated(),
            'posted_by' => auth()->id(),
        ]);

        return response()->json($job, 201);
    }

    public function update(StoreJobRequest $request, Job $job): JsonResponse
    {
        $job->update($request->validated());

        return response()->json($job);
    }

    public function destroy(Job $job): JsonResponse
    {
        $job->delete();

        return response()->json(['message' => 'Job deleted']);
    }
}
