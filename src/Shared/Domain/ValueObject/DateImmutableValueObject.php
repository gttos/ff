<?php

declare(strict_types=1);

namespace Gtto\Shared\Domain\ValueObject;

abstract class DateImmutableValueObject
{
    private const INVALID_ARGUMENT_ERROR_MESSAGE = 'Invalid date \'%s\'';

    const FORMAT = 'Y-m-d';

    /** @var \DateTimeImmutable */
    private $value;

    public function __construct(\DateTimeImmutable $value)
    {
        $this->value = $value;
    }

    public function equals(self $value): bool
    {
        return
            $this->value()->format(self::FORMAT)
            === $value->value()->format(self::FORMAT);
    }

    public function gt(self $value): bool
    {
        return
            $this->value()->format(self::FORMAT)
            > $value->value()->format(self::FORMAT);
    }

    public function gte(self $value): bool
    {
        return
            $this->value()->format(self::FORMAT)
            >= $value->value()->format(self::FORMAT);
    }

    public function lt(self $value): bool
    {
        return
            $this->value()->format(self::FORMAT)
            < $value->value()->format(self::FORMAT);
    }

    public function lte(self $value): bool
    {
        return
            $this->value()->format(self::FORMAT)
            <= $value->value()->format(self::FORMAT);
    }

    public static function fromString(string $date): self
    {
        try {
            return new self(new \DateTimeImmutable($date));
        } catch (\Exception $e) {
            throw new \InvalidArgumentException(sprintf(self::INVALID_ARGUMENT_ERROR_MESSAGE, $date));
        }
    }

    public static function now(): self
    {
        return new self(new \DateTimeImmutable());
    }

    public function value(): \DateTimeImmutable
    {
        return $this->value;
    }
}
