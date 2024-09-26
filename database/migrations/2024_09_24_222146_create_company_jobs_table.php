<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('company_jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->string('position');
            $table->string('location')->nullable();
            $table->integer('salary')->nullable();
            $table->text('description')->nullable();
            $table->text('preferred_skills')->nullable();
            $table->text('mandatory_skills')->nullable();
            $table->enum('job_type', ['full-time', 'part-time', 'contract', 'internship'])->default('full-time');
            $table->enum('type', ['remote', 'hybrid', 'onsite'])->default('onsite');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_jobs');
    }
};
