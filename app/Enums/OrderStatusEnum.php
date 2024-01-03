<?php

namespace App\Enums;

enum OrderStatusEnum: string
{
    case ACCEPTED = 'accepted';
    case IN_PROGRESS = 'in_progress';
    case DONE = 'done';

    public const values = [
        'accepted',
        'in_progress',
        'done',
    ];
}


