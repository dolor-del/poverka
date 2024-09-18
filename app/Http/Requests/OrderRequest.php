<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class OrderRequest
 * @package App\Http\Requests
 *
 * @property string $name
 * @property string $address
 * @property string $phone
 * @property int    $declared
 * @property string $date
 * @property int    $user_id
 * @property string $description
 */
class OrderRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'        => 'required|string',
            'address'     => 'required|string',
            'phone'       => 'required|string',
            'declared'    => 'required|int',
            'date'        => 'required|date',
            'user_id'     => 'nullable|int',
            'description' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'     => 'Укажите имя',
            'address.required'  => 'Укажите адрес',
            'phone.required'    => 'Укажите телефон',
            'declared.required' => 'Укажите кол-во заявленных счетчиков',
            'date.required'     => 'Укажите дату',
            'date.date'         => 'Дата должна быть в правильном формате',
        ];
    }
}
