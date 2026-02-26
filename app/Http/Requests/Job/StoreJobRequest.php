<?php

namespace App\Http\Requests\Job;

use Illuminate\Foundation\Http\FormRequest;

class StoreJobRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'job_type' => ['required', 'in:full_time,part_time,remote,onsite,contract,freelance,internship'],
            'job_category' => ['required', 'string', 'max:100'],
            'salary_min' => ['nullable', 'integer'],
            'salary_max' => ['nullable', 'integer', 'gte:salary_min'],
            'positions' => ['required', 'integer', 'min:1'],
            'experience_needed' => ['nullable', 'string', 'max:255'],
            'last_date_to_apply' => ['required', 'date'],
            'location' => ['required', 'string', 'max:255'],
            'requirements' => ['nullable', 'array'],
        ];
    }
}
