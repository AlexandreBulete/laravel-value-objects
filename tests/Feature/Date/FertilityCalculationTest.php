<?php

declare(strict_types=1);

use AlexandreBulete\ValueObjects\ValueObjects\Date\Period;
use Carbon\CarbonImmutable;

it('calculates the fertility period correctly', function () {
    $menstruation = new Period(
        new CarbonImmutable('2024-06-01'),
        new CarbonImmutable('2024-06-05')
    );

    $fertilityStart  = $menstruation->start->addDays(10);
    $fertilityEnd    = $fertilityStart->addDays(6);
    $fertilityPeriod = new Period($fertilityStart, $fertilityEnd);
    $dto             = $fertilityPeriod->toDTO();

    expect($dto->start)->toBe('2024-06-11T00:00:00+00:00');
    expect($dto->end)->toBe('2024-06-17T00:00:00+00:00');
    expect($dto->diff['days'])->toBe(6.0);
});
