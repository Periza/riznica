<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePartnerRequest extends FormRequest
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
            'naziv' => 'required|string|max:255',
            'oib' => 'required|string|size:11|unique:partners,oib',
            'email' => 'required|email|max:255',
            'telefon' => 'required|string|max:20',
            'adresa' => 'required|string|max:255',
            'mjesto' => 'required|string|max:255',
        ];
    }
}
