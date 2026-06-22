<?php

use App\Models\Employer;
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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Employer::class);
            $table->string('title');
            $table->string('salary');
            $table->string('location');
            $table->boolean('is_approved')->default(false);
            $table->string('schedule')->default('Full time');
            $table->string('gender_preference')->default('Any');
            $table->string('teaching_mode')->default('In-person');
            $table->string('url');
            $table->enum('status', [
                'pending',
                'approved',
                'rejected',
            ])->default('pending');
            $table->boolean('featured')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
