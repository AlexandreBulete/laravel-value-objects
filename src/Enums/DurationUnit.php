<?php

declare(strict_types=1);

namespace AlexandreBulete\ValueObjects\Enums;

enum DurationUnit: string
{
    case Seconds = 'seconds';
    case Minutes = 'minutes';
    case Hours   = 'hours';
    case Days    = 'days';
    case Weeks   = 'weeks';
    case Months  = 'months';
    case Years   = 'years';
}
