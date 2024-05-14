<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RecipesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->recipe_name,
            'creator' => $this->creator,
            'ingredients' => $this->ingredients,
            'likes' => $this->likes,
            'timetocook' => $this->timetocook,
            'Timetoprepare' => $this->timetoprepare,
            'category' => $this->category,
            'cuisine' => $this->cuisine,
            'servings' => $this->servings,
            'nutritional_values' => $this->nutritional_values,
            'search_keywords' => $this->search_keywords,
            'recipe_details' => $this->whenLoaded('recipe_details'),
            'media' => $this->whenLoaded('media'),
        ];
    }
}