<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OperatorRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'sifra' => 'required|numeric|unique:operators,sifra',
            'partner_id' => 'required|numeric|exists:partners,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255'
        ];
    }
}
