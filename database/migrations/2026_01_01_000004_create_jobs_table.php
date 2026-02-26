<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description');
            $table->string('job_type');
            $table->string('job_category');
            $table->integer('salary_min')->nullable();
            $table->integer('salary_max')->nullable();
            $table->unsignedInteger('positions')->default(1);
            $table->string('experience_needed')->nullable();
            $table->date('last_date_to_apply');
            $table->string('location');
            $table->json('requirements')->nullable();
            $table->unsignedBigInteger('views')->default(0);
            $table->boolean('is_active')->default(true);
            $table->foreignId('posted_by')->constrained('users')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
