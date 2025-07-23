<?php

declare(strict_types=1);

namespace AlexandreBulete\ValueObjects\DTOs\Date;

use AlexandreBulete\ValueObjects\Contracts\DTOInterface;
use AlexandreBulete\ValueObjects\Traits\JsonSerializableTrait;

final class PeriodDTO implements DTOInterface
{
    use JsonSerializableTrait;

    /**
     * @param  string  $start
     * @param  string  $end
     * @param  array<string, int>  $diff
     */
    public function __construct(
        public string $start,
        public string $end,
        public array $diff,
    ) {}

    public function toArray(): array
    {
        return [
            'start' => $this->start,
            'end'   => $this->end,
            'diff'  => $this->diff,
        ];
    }

    public function __toString(): string
    {
        return "{$this->start} - {$this->end}";
    }
}
