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
        Schema::create('forum', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('material_id');
            $table->unsignedBigInteger('parent_id')->nullable();;
            $table->unsignedBigInteger('reply_id')->nullable();
            // $table->string('course_session')->nullable();
            $table->string('forum_title')->nullable();
            $table->text('forum_message');
            $table->string('forum_attachment')->nullable();
            $table->boolean('deleted_by_admin')->default(false);
            $table->string('reason_delete')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('reply_id')->references('id')->on('forum')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('material_id')->references('id')->on('material')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forum');
    }
};
