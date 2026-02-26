<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'contact_number', 'location', 'cv_path', 'experiences', 'bio',
        'experience_time', 'skills',
    ];

    protected function casts(): array
    {
        return [
            'skills' => 'array',
        ];
    }
}
