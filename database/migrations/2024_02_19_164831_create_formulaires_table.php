<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('formulaires', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();

            for ($i = 1; $i <= 50; $i++) {
                $table->unsignedBigInteger('question' . $i)->nullable();
                $table->foreign('question' . $i)->references('id')->on('questions')->onDelete('cascade');
            }

            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formulaires');
    }
};
