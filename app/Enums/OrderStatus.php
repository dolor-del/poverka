<?php
namespace App\Enums;

use BenSampo\Enum\Enum;
use BenSampo\Enum\Contracts\LocalizedEnum;

final class OrderStatus extends Enum implements LocalizedEnum
{
    const FORMED    = 'FORMED';
    const AWAIT     = 'AWAIT';
    const COMPLETED = 'COMPLETED';
}
