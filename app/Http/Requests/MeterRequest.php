<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class MeterRequest
 * @package App\Http\Requests
 *
 * @property int    $order_id
 * @property string $doc_number
 * @property string $state_register
 * @property string $meter_number
 * @property string $modification
 * @property float  $temperature
 * @property string $date_contract
 * @property string $date_expire
 */
class MeterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'order_id'       => 'required|int',
            'doc_number'     => 'required|string',
            'state_register' => 'required|string',
            'meter_number'   => 'required|string',
            'modification'   => 'required|string',
            'temperature'    => 'required|numeric',
            'date_contract'  => 'required|date',
            'date_expire'    => 'required|date',
        ];
    }

    public function messages(): array
    {
        return [
            'order_id.required'       => 'Укажите адрес заявки',
            'doc_number.required'     => 'Заполните № док-та',
            'state_register.required' => 'Заполните № в госреестре',
            'meter_number.required'   => 'Заполните № счетчика',
            'modification.required'   => 'Заполните модификацию',
            'temperature.required'    => 'Укажите температуру жидкости',
            'temperature.numeric'     => 'Температура жидкости должна быть вещественным числом',
            'date_contract.required'  => 'Укажите дату поверки',
            'date_contract.date'      => 'Дата поверки должна быть в правильном формате',
            'date_expire.required'    => 'Укажите дату истечения срока поверки',
            'date_expire.date'        => 'Дата истечения срока поверки должна быть в правильном формате',
        ];
    }
}
