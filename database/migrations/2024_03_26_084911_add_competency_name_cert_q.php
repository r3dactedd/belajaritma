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
        Schema::table('certification_questions', function (Blueprint $table) {
            //
            $table->string('competency_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('certification_questions', function (Blueprint $table) {
            //
            $table->dropColumn('competency_name')->nullable();
        });
    }
};
