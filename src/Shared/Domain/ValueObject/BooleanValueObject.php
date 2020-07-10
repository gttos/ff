<?php

declare(strict_types=1);

namespace Gtto\Shared\Domain\ValueObject;

use InvalidArgumentException;

abstract class BooleanValueObject
{
    protected string $value;

    public function __construct(string $value)
    {
        $this->ensureIsValidValue($value);
        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }

    private function ensureIsValidValue($value): void
    {
        if ($value < 0 || $value > 1) {
            throw new InvalidArgumentException(sprintf('<%s> does not allow the value <%s>.', static::class, $value));

        }
    }
}
