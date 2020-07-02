<?php

declare(strict_types=1);

namespace Gtto\Shared\Domain\ValueObject;


abstract class DateValueObject
{
    protected string $value;

    public function __construct(\DateTime $date)
    {
        $date->format('Y-m-d');
        $date->setTimezone(new \DateTimeZone("europe/madrid"));
        $this->value = date_format($date, 'Y-m-d');
    }

    public function value(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->value();
    }
}
