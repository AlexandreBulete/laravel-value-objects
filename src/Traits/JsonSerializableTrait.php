<?php

declare(strict_types=1);

namespace AlexandreBulete\ValueObjects\Traits;

trait JsonSerializableTrait
{
    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}