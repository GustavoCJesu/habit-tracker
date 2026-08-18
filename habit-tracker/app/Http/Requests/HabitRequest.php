<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Override;

class HabitRequest extends FormRequest {
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
            'name' => 'required|max:255|string'
        ];
    }

    #[Override]
    public function messages() {
        {
            return [
                'name.required' => 'O campo deve ser preenchido.',
                'name.max' => 'O campo deve ter no maximo 255 caracteres.',
                'name.string' => 'O campo deve ser um texto valido.'
            ];
        }
    }
}
