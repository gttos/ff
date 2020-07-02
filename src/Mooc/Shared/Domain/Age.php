<?php

declare(strict_types = 1);

namespace Gtto\Mooc\Shared\Domain;

use Gtto\Shared\Domain\ValueObject\IntValueObject;

final class Age extends IntValueObject
{
    public function isBetweenAges(): bool
    {
        return $this->value() > 16 && $this->value() < 80;
    }
}
