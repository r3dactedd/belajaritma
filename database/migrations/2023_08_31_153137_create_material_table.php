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
        Schema::create('material', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id')->references('id')->on('courses')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('master_type_id');
            $table->foreign('master_type_id')->references('id')->on('master_type')->onUpdate('cascade')->onDelete('cascade');
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('detailed_description')->nullable();
            $table->unsignedBigInteger('minimum_score')->default(0);
            $table->unsignedBigInteger('total_questions')->default(0);
            $table->unsignedBigInteger('material_duration');
            $table->string('pdf_link')->nullable();
            $table->string('video_link')->nullable();
            $table->boolean('is_completed')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('material');
    }
};
