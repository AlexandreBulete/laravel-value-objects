<?php

declare(strict_types=1);

use AlexandreBulete\ValueObjects\ValueObjects\Date\Period;
use AlexandreBulete\ValueObjects\Exceptions\InvalidPeriodException;
use Carbon\CarbonImmutable;

it('creates a valid period and returns correct diff', function () {
    $period = new Period(
        new CarbonImmutable('2024-06-01'),
        new CarbonImmutable('2024-06-05')
    );
    $dto = $period->toDTO();

    expect($dto->start)->toBe('2024-06-01T00:00:00+00:00');
    expect($dto->end)->toBe('2024-06-05T00:00:00+00:00');
    expect($dto->diff['days'])->toBe(4);
});

it('throws an exception if start is after end', function () {
    new Period(
        new CarbonImmutable('2024-06-10'),
        new CarbonImmutable('2024-06-05')
    );
})->throws(InvalidPeriodException::class, 'Start must be before end.');