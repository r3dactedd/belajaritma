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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('course_name');
            $table->string('short_desc');
            $table->string('course_desc');
            $table->string('level');
            $table->string('course_img')->default('placeholder.webp');;
            $table->string('screen_resolution');
            $table->string('minimum_ram');
            $table->string('processor');
            $table->string('operating_system');
            $table->string('other_programs');
            $table->unsignedBigInteger('total_module')->default(0);
            $table->unsignedBigInteger('total_time')->default(0);
            $table->unsignedBigInteger('students_enrolled')->default(0);
            $table->integer('last_accessed_material')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');
            $table->timestamps();
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
