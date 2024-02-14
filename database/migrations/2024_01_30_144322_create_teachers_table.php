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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->string('email')->unique();
            $table->integer('course1');
            $table->integer('course2')->nullable();
            $table->integer('course3')->nullable();
            $table->integer('course4')->nullable();
            $table->integer('course5')->nullable();
            $table->integer('course6')->nullable();
            $table->integer('course7')->nullable();
            $table->integer('course8')->nullable();
            $table->integer('course9')->nullable();
            $table->integer('course10')->nullable();
            $table->integer('course11')->nullable();
            $table->integer('course12')->nullable();
            $table->foreignId('current_team_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
