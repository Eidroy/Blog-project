<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentsResource extends JsonResource
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
            'recipe_id' => $this->recipe_id,
            'poster_name' => $this->poster_name,
            'comment_text' => $this->comment_text,
            'createdAt' => $this->createdAt,
            'user_id' => $this->user_id,
            'rating' => $this->rating,
            'approved' => $this->approved,
        ];
    }
}
