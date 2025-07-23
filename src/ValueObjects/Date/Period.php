<?php

declare(strict_types=1);

namespace AlexandreBulete\ValueObjects\ValueObjects\Date;

use AlexandreBulete\ValueObjects\Contracts\ValueObjectInterface;
use AlexandreBulete\ValueObjects\DTOs\Date\PeriodDTO;
use AlexandreBulete\ValueObjects\Enums\DurationUnit;
use AlexandreBulete\ValueObjects\Exceptions\InvalidPeriodException;
use Carbon\CarbonImmutable;

final class Period implements ValueObjectInterface
{
    public function __construct(
        public CarbonImmutable $start,
        public CarbonImmutable $end
    ) {
        if ($start->gt($end)) {
            throw new InvalidPeriodException('Start must be before end.');
        }
    }

    /**
     * Returns the duration of the period in the desired unit.
     */
    public function duration(DurationUnit $unit): Duration
    {
        $amount = match ($unit) {
            DurationUnit::Seconds => $this->start->diffInSeconds($this->end),
            DurationUnit::Minutes => $this->start->diffInMinutes($this->end),
            DurationUnit::Hours   => $this->start->diffInHours($this->end),
            DurationUnit::Days    => $this->start->diffInDays($this->end),
            DurationUnit::Weeks   => $this->start->diffInWeeks($this->end),
            DurationUnit::Months  => $this->start->diffInMonths($this->end),
            DurationUnit::Years   => $this->start->diffInYears($this->end),
        };

        return new Duration((float) $amount, $unit);
    }

    /**
     * Returns a DTO representation of the period.
     */
    public function toDTO(): PeriodDTO
    {
        return new PeriodDTO(
            $this->start->toIso8601String(),
            $this->end->toIso8601String(),
            [
                'seconds' => $this->duration(DurationUnit::Seconds)->amount,
                'minutes' => $this->duration(DurationUnit::Minutes)->amount,
                'hours'   => $this->duration(DurationUnit::Hours)->amount,
                'days'    => $this->duration(DurationUnit::Days)->amount,
                'weeks'   => $this->duration(DurationUnit::Weeks)->amount,
                'months'  => $this->duration(DurationUnit::Months)->amount,
                'years'   => $this->duration(DurationUnit::Years)->amount,
            ]
        );
    }

    public static function fromStrings(string $start, string $end): self
    {
        return new self(new CarbonImmutable($start), new CarbonImmutable($end));
    }
}
