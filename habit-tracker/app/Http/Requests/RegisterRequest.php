<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Override;

class RegisterRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array {
        return [
            'name' => 'required|max:255|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|max:60|confirmed'
        ];
    }

    #[Override]
    public function messages(): array {

        return [
            'name.required' => 'O campo nome é obrigatorio.',
            'name.max' => 'O nome deve ter no maximo 255 caracteres.',
            'name.string' => 'O nome deve ser uma texto valida.',

            'email.required' => 'O campo email é obrigatorio.',
            'email.email' => 'O campo e-mail deve ser um endereço de email valido',
            'email.unique' => 'O email ja esta em uso',

            'password.required' => 'O campo senha é obrigatorio.',
            'password.min' => 'A senha deve conter no minimo 6 caracteres.',
            'password.max' => 'A senha deve conter no maximo 60 caracteres.',
            'password.confirmed' => 'As senhas não coincidem'
        ];
    }
}
