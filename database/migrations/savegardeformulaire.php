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
            $table->integer('question1');
            $table->integer('question2')->nullable();
            $table->integer('question3')->nullable();
            $table->integer('question4')->nullable();
            $table->integer('question5')->nullable();
            $table->integer('question6')->nullable();
            $table->integer('question7')->nullable();
            $table->integer('question8')->nullable();
            $table->integer('question9')->nullable();
            $table->integer('question10')->nullable();
            $table->integer('question11')->nullable();
            $table->integer('question12')->nullable();
            $table->integer('question13')->nullable();
            $table->integer('question14')->nullable();
            $table->integer('question15')->nullable();
            $table->integer('question16')->nullable();
            $table->integer('question17')->nullable();
            $table->integer('question18')->nullable();
            $table->integer('question19')->nullable();
            $table->integer('question20')->nullable();
            $table->integer('question21')->nullable();
            $table->integer('question22')->nullable();
            $table->integer('question23')->nullable();
            $table->integer('question24')->nullable();
            $table->integer('question25')->nullable();
            $table->integer('question26')->nullable();
            $table->integer('question27')->nullable();
            $table->integer('question28')->nullable();
            $table->integer('question29')->nullable();
            $table->integer('question30')->nullable();
            $table->integer('question31')->nullable();
            $table->integer('question32')->nullable();
            $table->integer('question33')->nullable();
            $table->integer('question34')->nullable();
            $table->integer('question35')->nullable();
            $table->integer('question36')->nullable();
            $table->integer('question37')->nullable();
            $table->integer('question38')->nullable();
            $table->integer('question39')->nullable();
            $table->integer('question40')->nullable();
            $table->integer('question41')->nullable();
            $table->integer('question42')->nullable();
            $table->integer('question43')->nullable();
            $table->integer('question44')->nullable();
            $table->integer('question45')->nullable();
            $table->integer('question46')->nullable();
            $table->integer('question47')->nullable();
            $table->integer('question48')->nullable();
            $table->integer('question49')->nullable();
            $table->integer('question50')->nullable();

            $table->timestamps();
            // $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
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
