<?php

namespace App\Enums;

enum ProjectStatusEnum: string
{
    case OPEN = 'Open';
    case IN_PROGRESS = 'In Progress';
    case CLOSED = 'Closed';
    case CANCELLED = 'Cancelled';
    case ON_HOLD = 'On Hold';
    case COMPLETED = 'Completed';
}
