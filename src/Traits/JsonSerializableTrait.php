<?php

declare(strict_types=1);

namespace AlexandreBulete\ValueObjects\Traits;

trait JsonSerializableTrait
{
    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}
