<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CloudinaryStoreRequest extends FormRequest
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
            'file_url' => 'required|text|max:1000',
            'medially_type' => 'required',
            'file_name' => 'required|string|max:255',
            'size' => 'required|string|max:255',
            'file_type' => 'required|string|max:255'
        ];
    }
}
