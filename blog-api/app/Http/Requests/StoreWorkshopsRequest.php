<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWorkshopsRequest extends FormRequest
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
            'workshop_name' => 'required|string',
            'hosted_by' => 'required|string',
            'country' => 'required|string',
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'contact' => 'required|string',
            'user_email' => 'required|email',
            'user_id' => 'required|integer',
            'date' => 'required|string',
            'time' => 'required|string',
            'attendees' => 'required|integer',
            'payment' => 'required|integer',
        ];
    }
}
