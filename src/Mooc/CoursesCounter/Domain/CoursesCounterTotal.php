<?php

declare(strict_types=1);

namespace Gtto\Mooc\CoursesCounter\Domain;

use Gtto\Shared\Domain\ValueObject\IntValueObject;

final class CoursesCounterTotal extends IntValueObject
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
