<?php

declare(strict_types = 1);

namespace Gtto\Mooc\Moments\Domain;

use Gtto\Shared\Domain\ValueObject\IntValueObject;
use InvalidArgumentException;

final class MomentRate extends IntValueObject
{
    public function __construct(int $value)
    {
        $this->ensureIsValidRate($value);

        parent::__construct($value);
    }

    public function ensureIsValidRate(int $value)
    {
        if (!in_array($value, range(1,5))){
            throw new InvalidArgumentException(sprintf('<%s> does not allow the value <%s>.', static::class, $value));
        }
    }
}
