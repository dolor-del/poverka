<?php

use App\Enums\OrderStatus;
use App\Enums\UserRole;

return [
    OrderStatus::class => [
        OrderStatus::FORMED => 'Сформирована',
        OrderStatus::AWAIT => 'Ожидает',
        OrderStatus::COMPLETED => 'Выполнена',
    ],

    UserRole::class => [
        UserRole::ADMIN => 'Администратор',
        UserRole::DISPATCHER => 'Диспетчер',
        UserRole::WORKER => 'Специалист',
    ],
];
