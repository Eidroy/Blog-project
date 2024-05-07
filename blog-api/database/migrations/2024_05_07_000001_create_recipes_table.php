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
            $table->string('TimetoCook');
            $table->string('Timetoprepare');
            $table->string('category');
            $table->string('Quisine');
            $table->integer('servings');
            $table->json('ingredients');
            $table->json('Nutritional_values');
            $table->timestamps();
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
