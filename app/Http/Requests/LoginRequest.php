<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email'    => ['required', 'email'],
            'password' => ['required', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'email.required'    => 'Укажите email',
            'email.email'       => 'Некорректный email',
            'password.required' => 'Введите пароль',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
