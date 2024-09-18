<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ItineraryRequest
 * @package App\Http\Requests
 *
 * @property string $name
 * @property string $address
 * @property string $phone
 * @property string $description
 */
class ItineraryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'        => 'required|string',
            'address'     => 'required|string',
            'phone'       => 'required|string',
            'description' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'    => 'Укажите имя',
            'address.required' => 'Укажите адрес',
            'phone.required'   => 'Укажите телефон',
        ];
    }
}
