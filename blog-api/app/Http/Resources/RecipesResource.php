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
            'TimetoCook' => $this->TimetoCook,
            'Timetoprepare' => $this->Timetoprepare,
            'category' => $this->category,
            'Quisine' => $this->Quisine,
            'servings' => $this->servings,
            'Nutritional_values' => $this->Nutritional_values,
        ];
    }
}