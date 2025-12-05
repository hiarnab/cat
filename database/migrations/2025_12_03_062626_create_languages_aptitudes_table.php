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
        Schema::create('languages_aptitudes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('section_id')->nullable();
            $table->unsignedBigInteger('question_id')->nullable();
               $table->unsignedBigInteger('answer_id')->nullable();

            $table->string('answer_option')->nullable();
           
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('section_id')->references('id')->on('sections');
            $table->foreign('question_id')->references('id')->on('questions');
               $table->foreign('answer_id')->references('id')->on('answer_options');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('languages_aptitudes');
    }
};
