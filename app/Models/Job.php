<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'job_type', 'job_category', 'salary_min', 'salary_max',
        'positions', 'experience_needed', 'last_date_to_apply', 'location', 'requirements',
        'is_active', 'views', 'posted_by',
    ];

    protected function casts(): array
    {
        return [
            'last_date_to_apply' => 'date',
            'is_active' => 'boolean',
            'requirements' => 'array',
        ];
    }

    public function employer()
    {
        return $this->belongsTo(User::class, 'posted_by');
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
