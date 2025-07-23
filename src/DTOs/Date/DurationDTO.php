<?php

declare(strict_types=1);

namespace AlexandreBulete\ValueObjects\DTOs\Date;

use AlexandreBulete\ValueObjects\Contracts\DTOInterface;
use AlexandreBulete\ValueObjects\Traits\JsonSerializableTrait;

final class DurationDTO implements DTOInterface
{
    use JsonSerializableTrait;

    /**
     * @param  int  $amount
     * @param  string  $unit
     */
    public function __construct(
        public int $amount,
        public string $unit
    ) {}

    public function toArray(): array
    {
        return [
            'amount' => $this->amount,
            'unit'   => $this->unit,
        ];
    }

    public function __toString(): string
    {
        return "{$this->amount} {$this->unit}";
    }
}
