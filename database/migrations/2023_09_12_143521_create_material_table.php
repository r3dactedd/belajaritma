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
            $table->string('master_type_id');
            $table->string('question')->nullable();
            $table->integer('answer')->nullable();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('pdf_link')->nullable();
            $table->string('video_link')->nullable();
            $table->timestamps();

            // Menambahkan foreign key constraints
            $table->foreign('course_id')->references('id')->on('courses');

            // Indeks untuk kolom material_type (opsional)
            $table->foreign('master_type_id')->references('id')->on('master_type')->onUpdate('cascade')->onDelete('cascade');
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
