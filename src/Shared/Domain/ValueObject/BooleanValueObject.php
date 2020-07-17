<?php

declare(strict_types=1);

namespace Gtto\Shared\Domain\ValueObject;

use InvalidArgumentException;

abstract class BooleanValueObject
{
    protected bool $value;

    public function __construct(bool $value)
    {
        $this->ensureIsValidValue($value);
        $this->value = $value;
    }

    public function value(): bool
    {
        return $this->value;
    }

    private function ensureIsValidValue($value): void
    {
        if (in_array($value, range(0,1))) {
            throw new InvalidArgumentException(sprintf('<%s> does not allow the value <%s>.', static::class, $value));

        }
    }
}
