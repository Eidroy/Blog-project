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
        Schema::create('recipes', function (Blueprint $table) {
            $table->id('id');
            $table->string('recipe_name');
            $table->string('creator');
            $table->integer('likes');
            $table->string('timetocook');
            $table->string('timetoprepare');
            $table->string('category');
            $table->string('cuisine');
            $table->integer('servings');
            $table->json('ingredients');
            $table->json('nutritional_values');
            $table->unsignedBigInteger('detail_id');
            $table->json('search_keywords');
            $table->timestamps();
            $table->foreign('detail_id')->references('id')->on('recipe_details')->onDelete('cascade');
        });
    }

    protected $casts = [
        'ingredients' => 'array',
        'Nutritional_values' => 'array',
    ];

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
