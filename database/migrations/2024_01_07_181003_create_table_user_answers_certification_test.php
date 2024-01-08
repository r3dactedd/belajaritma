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
        Schema::create('user_answers_certification_test', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('question_id');
            $table->string('selected_answer');
            $table->text('answer_detail')->nullable();
            $table->string('type');
            $table->boolean('is_correct')->nullable();

            $table->timestamps();

            // Definisi foreign key
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('question_id')->references('id')->on('certification_questions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_answers_certification_test');
    }
};
