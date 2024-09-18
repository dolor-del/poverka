<?php
namespace App\Enums;

use BenSampo\Enum\Enum;
use BenSampo\Enum\Contracts\LocalizedEnum;

final class UserRole extends Enum implements LocalizedEnum
{
    const ADMIN      = 'ADMIN';
    const DISPATCHER = 'DISPATCHER';
    const WORKER     = 'WORKER';
}
