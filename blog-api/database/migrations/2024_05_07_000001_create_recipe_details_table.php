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
        Schema::create('recipe_details', function (Blueprint $table) {
            $table->id('id');
            $table->text('content1');
            $table->text('content2');
            $table->text('content3');
            $table->text('content4');
            $table->integer('image1');
            $table->integer('image2');
            $table->integer('image3');
            $table->integer('image4');
            $table->timestamps();
            $table->foreign('image1')->references('id')->on('media')->onDelete('cascade');
            $table->foreign('image2')->references('id')->on('media')->onDelete('cascade');
            $table->foreign('image3')->references('id')->on('media')->onDelete('cascade');
            $table->foreign('image4')->references('id')->on('media')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipe_details');
    }
};
