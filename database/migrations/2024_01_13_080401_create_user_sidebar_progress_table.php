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
        Schema::create('user_sidebar_progress', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');// Assuming you have a users table
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('sidebar_id'); // Assuming you have a sidebars table
            $table->foreign('sidebar_id')->references('id')->on('sidebar')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('course_id'); // Assuming you have a sidebars table
            $table->foreign('course_id')->references('id')->on('courses')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('material_id');
            $table->foreign('material_id')->references('id')->on('material')->onUpdate('cascade')->onDelete('cascade');
            $table->boolean('is_locked')->default(true);
            $table->boolean('is_visible')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_sidebar_progress');
    }
};
