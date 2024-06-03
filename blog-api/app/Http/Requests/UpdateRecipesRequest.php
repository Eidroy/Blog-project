<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRecipesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'recipe_name' => 'string|max:255',
            'creator' => 'string|max:255',
            'ingredients' => 'json',
            'likes' => 'integer',
            'TimetoCook' => 'string',
            'Timetoprepare' => 'string',
            'category' => 'string',
            'Quisine' => 'string',
            'servings' => 'integer',
            'Nutritional_values' => 'json',
        ];
    }
}
