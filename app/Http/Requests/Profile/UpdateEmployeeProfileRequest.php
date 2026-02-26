<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeProfileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'contact_number' => ['nullable', 'string', 'max:30'],
            'location' => ['nullable', 'string', 'max:255'],
            'cv_path' => ['nullable', 'string', 'max:255'],
            'experiences' => ['nullable', 'string'],
            'bio' => ['nullable', 'string'],
            'experience_time' => ['nullable', 'string', 'max:100'],
            'skills' => ['nullable', 'array'],
        ];
    }
}
