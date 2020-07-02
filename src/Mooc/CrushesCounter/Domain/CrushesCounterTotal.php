<?php

declare(strict_types = 1);

namespace Gtto\Mooc\CrushesCounter\Domain;

use Gtto\Shared\Domain\ValueObject\IntValueObject;

final class CrushesCounterTotal extends IntValueObject
{
    public static function initialize(): self
    {
        return new self(0);
    }

    public function increment(): self
    {
        return new self($this->value() + 1);
    }
}
