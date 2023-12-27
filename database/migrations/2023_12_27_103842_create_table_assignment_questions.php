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
        Schema::create('assignment_questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('material_id');
            $table->string('questions');
            $table->string('jawaban_a');
            $table->string('jawaban_b');
            $table->string('jawaban_c');
            $table->string('jawaban_d');
            $table->string('jawaban_benar');
            $table->timestamps();

            $table->foreign('material_id')->references('id')->on('material')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignment_questions');
    }
};
