<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployerProfileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'personal_phone' => ['nullable', 'string', 'max:30'],
            'company_name' => ['required', 'string', 'max:255'],
            'company_location' => ['required', 'string', 'max:255'],
            'company_contact_number' => ['required', 'string', 'max:30'],
            'company_website' => ['nullable', 'url', 'max:255'],
            'company_contact_details' => ['nullable', 'string'],
            'company_description' => ['required', 'string'],
            'is_active' => ['required', 'boolean'],
            'company_experience_year' => ['nullable', 'integer', 'min:0'],
            'is_verified_to_government' => ['nullable', 'boolean'],
            'verified_year' => ['nullable', 'integer'],
        ];
    }
}
