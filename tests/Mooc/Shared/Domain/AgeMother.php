<?php

declare(strict_types = 1);

namespace Gtto\Tests\Mooc\Shared\Domain;

use Gtto\Mooc\Shared\Domain\Age;
use Gtto\Tests\Shared\Domain\IntegerMother;

final class AgeMother
{
    public static function create(int $value): Age
    {
        return new Age($value);
    }

    public static function creator(): callable
    {
        return static function () {
            return self::random();
        };
    }

    public static function random(): Age
    {
        return self::create(IntegerMother::between(18,80));
    }
}
