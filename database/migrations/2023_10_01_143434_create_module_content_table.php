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
        Schema::create('module_content', function (Blueprint $table) {
            $table->id();
            $table->string('content_title');
            $table->string('content_description')->nullable();
            $table->boolean('is_completed');
            $table->unsignedBigInteger('material_id');
            $table->foreign('material_id')->references('id')->on('material')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('module_content');
    }
};
