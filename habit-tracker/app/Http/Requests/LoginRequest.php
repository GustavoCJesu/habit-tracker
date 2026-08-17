<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Override;

class LoginRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'password' => 'required|min:6|max:60'
            ];
    }

    #[Override]
    public function messages(): array
    {
        return [
            'email.required' => 'O campo email é obrigatorio',
            'email.email' => 'O campo email deve ser um endereço de email valido',
            'password.required' => 'O campo de senha é obrigatorio.',
            'password.min' => 'A senha deve conter no minimo 6 caracteres',
            'password.max' => 'A senha deve conter no maximo 60 caracteres'
        ];
    }
}
