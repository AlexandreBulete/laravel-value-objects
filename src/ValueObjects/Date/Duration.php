<?php

declare(strict_types=1);

namespace AlexandreBulete\ValueObjects\ValueObjects\Date;

use AlexandreBulete\ValueObjects\Contracts\ValueObjectInterface;
use AlexandreBulete\ValueObjects\DTOs\Date\DurationDTO;
use AlexandreBulete\ValueObjects\Enums\DurationUnit;
use Carbon\CarbonImmutable;

final class Duration implements ValueObjectInterface
{
    public function __construct(
        public int $amount,
        public DurationUnit $unit
    ) {}

    /**
     * Adds the duration to a given date.
     */
    public function addTo(CarbonImmutable $date): CarbonImmutable
    {
        return match ($this->unit) {
            DurationUnit::Seconds => $date->addSeconds($this->amount),
            DurationUnit::Minutes => $date->addMinutes($this->amount),
            DurationUnit::Hours   => $date->addHours($this->amount),
            DurationUnit::Days    => $date->addDays($this->amount),
            DurationUnit::Weeks   => $date->addWeeks($this->amount),
            DurationUnit::Months  => $date->addMonths($this->amount),
            DurationUnit::Years   => $date->addYears($this->amount),
        };
    }

    public function toDTO(): DurationDTO
    {
        return new DurationDTO(
            $this->amount,
            $this->unit->value
        );
    }
}
