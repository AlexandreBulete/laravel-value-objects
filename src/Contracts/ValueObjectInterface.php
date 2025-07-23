<?php

declare(strict_types=1);

namespace AlexandreBulete\ValueObjects\Contracts;

interface ValueObjectInterface
{
    /**
     * @return DTOInterface
     */
    public function toDTO(): DTOInterface;
}
