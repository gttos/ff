<?php

declare(strict_types = 1);

namespace Gtto\Mooc\Crushes\Domain;

use Gtto\Shared\Domain\ValueObject\IntValueObject;

final class Age extends IntValueObject
{
    public function __construct(int $value)
    {
        $this->isBetweenAges($value);
        parent::__construct($value);
    }

    public function isBetweenAges($value): bool
    {
        return $value > 16 && $value < 80;
    }
}
