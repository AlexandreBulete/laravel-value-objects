<?php

declare(strict_types=1);

namespace AlexandreBulete\ValueObjects\Contracts;

use JsonSerializable;

interface DTOInterface extends JsonSerializable
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(): array;

    /**
     * @return string
     */
    public function __toString(): string;
}
