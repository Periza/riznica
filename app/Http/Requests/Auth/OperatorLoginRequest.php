<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;


class OperatorLoginRequest extends FormRequest
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
            'sifra' => ['required'],
            'password' => ['required', 'string']
        ];
    }

    public function authenticate(): void
    {
        if(!Auth::attempt($this->only('sifra', 'password')))
        {
            throw ValidationException::withMessages([
                'sifra' => 'neuspijela prijava',
            ]);
        }
    }
}
