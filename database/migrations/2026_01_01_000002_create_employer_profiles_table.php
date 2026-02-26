<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('employer_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->constrained()->cascadeOnDelete();
            $table->string('personal_phone')->nullable();
            $table->string('company_name');
            $table->string('company_location');
            $table->string('company_contact_number');
            $table->string('company_website')->nullable();
            $table->text('company_contact_details')->nullable();
            $table->text('company_description');
            $table->boolean('is_active')->default(true);
            $table->unsignedInteger('company_experience_year')->nullable();
            $table->boolean('is_verified_to_government')->default(false);
            $table->unsignedInteger('verified_year')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('employer_profiles');
    }
};
