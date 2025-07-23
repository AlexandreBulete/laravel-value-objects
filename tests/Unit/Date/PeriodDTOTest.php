<?php

declare(strict_types=1);

use AlexandreBulete\ValueObjects\DTOs\Date\PeriodDTO;

it('returns correct array and string representations', function () {
    $dto = new PeriodDTO(
        '2024-06-01T00:00:00+00:00',
        '2024-06-05T00:00:00+00:00',
        ['days' => 4.0, 'hours' => 96.0]
    );

    expect($dto->toArray())->toBe([
        'start' => '2024-06-01T00:00:00+00:00',
        'end'   => '2024-06-05T00:00:00+00:00',
        'diff'  => ['days' => 4.0, 'hours' => 96.0],
    ]);

    expect((string) $dto)->toBe('2024-06-01T00:00:00+00:00 - 2024-06-05T00:00:00+00:00');
    expect(json_encode($dto))->toBe(json_encode($dto->toArray()));
});
