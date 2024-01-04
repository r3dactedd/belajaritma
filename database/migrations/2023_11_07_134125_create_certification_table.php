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
        Schema::create('certification', function (Blueprint $table) {
            $table->id();
            $table->string('certif_title');
            $table->string('certif_short_desc');
            $table->text('certif_desc');
            $table->string('certif_img');
            $table->unsignedBigInteger('certif_duration');
            $table->unsignedBigInteger('certif_cost');
            $table->text('certif_outline');
            $table->unsignedBigInteger('students_registered')->default(0);
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');
            $table->unsignedBigInteger('total_questions')->default(0);
            $table->unsignedBigInteger('minimum_score')->default(0);
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
        Schema::dropIfExists('certification');
    }
};
