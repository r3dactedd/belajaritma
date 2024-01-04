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
        Schema::create('material_completed', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('material_id');
            $table->unsignedBigInteger('enrollment_id');
            $table->unsignedBigInteger('score_id')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('material_id')->references('id')->on('material')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('enrollment_id')->references('id')->on('enrollments')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('material_completed');
    }
};
