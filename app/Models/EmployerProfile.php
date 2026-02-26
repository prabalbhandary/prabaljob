<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployerProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'personal_phone', 'company_name', 'company_location', 'company_contact_number',
        'company_website', 'company_contact_details', 'company_description', 'is_active',
        'company_experience_year', 'is_verified_to_government', 'verified_year',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'is_verified_to_government' => 'boolean',
        ];
    }
}
