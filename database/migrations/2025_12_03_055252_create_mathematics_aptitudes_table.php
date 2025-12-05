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
        Schema::create('mathematics_aptitudes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('section_id')->nullable();
            $table->string('question_01')->nullable();
            $table->string('question_02')->nullable();
            $table->string('question_03')->nullable();
            $table->string('question_04')->nullable();
            $table->string('question_05')->nullable();
            $table->foreign('section_id')->references('id')->on('sections');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mathematics_aptitudes');
    }
};
