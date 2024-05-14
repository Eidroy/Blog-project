<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRecipesRequest extends FormRequest
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
            'recipe_name' => 'required|string|max:255',
            'creator' => 'required|string|max:255',
            'ingredients' => 'required|json',
            'likes' => 'required|integer',
            'timetocook' => 'required|string',
            'timetoprepare' => 'required|string',
            'category' => 'required|string',
            'cuisine' => 'required|string',
            'servings' => 'required|integer',
            'nutritional_values' => 'required|json',
            'search_keywords' => 'required|json',
        ];
    }
}
