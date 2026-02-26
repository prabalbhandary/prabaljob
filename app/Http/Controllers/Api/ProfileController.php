<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\UpdateEmployeeProfileRequest;
use App\Http\Requests\Profile\UpdateEmployerProfileRequest;
use Illuminate\Http\JsonResponse;

class ProfileController extends Controller
{
    public function show(): JsonResponse
    {
        return response()->json(auth()->user()->load('employerProfile', 'employeeProfile'));
    }

    public function updateEmployer(UpdateEmployerProfileRequest $request): JsonResponse
    {
        $profile = auth()->user()->employerProfile()->updateOrCreate([], $request->validated());

        return response()->json($profile);
    }

    public function updateEmployee(UpdateEmployeeProfileRequest $request): JsonResponse
    {
        $profile = auth()->user()->employeeProfile()->updateOrCreate([], $request->validated());

        return response()->json($profile);
    }
}
