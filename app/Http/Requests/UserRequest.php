<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UserRequest
 * @package App\Http\Requests
 *
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $role
 */
class UserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'     => 'required|string',
            'email'    => 'required|email',
            'password' => 'nullable|string',
            'role'     => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'  => 'Укажите имя',
            'email.required' => 'Укажите email',
            'email.email'    => 'Некорректный email',
            'role.required'  => 'Укажите права пользователя',
        ];
    }
}
