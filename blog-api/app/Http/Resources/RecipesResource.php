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
            'name' => $this->Recipe_name,
            'creator' => $this->creator,
            'ingredients' => $this->ingredients,
            'likes' => $this->likes,
            'timetocook' => $this->timetocook,
            'Timetoprepare' => $this->timetoprepare,
            'category' => $this->category,
            'cuisine' => $this->cuisine,
            'servings' => $this->servings,
            'nutritional_values' => $this->nutritional_values,
            'detail_id' => $this->detail_id,
            'search_keywords' => $this->search_keywords,
        ];
    }
}