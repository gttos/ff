<?php

declare(strict_types = 1);

namespace Gtto\Tests\Mooc\Shared\Domain;

use Gtto\Mooc\Shared\Domain\ZoneId;
use Gtto\Tests\Shared\Domain\UuidMother;

final class ZoneIdMother
{
    public static function create(string $value): ZoneId
    {
        return new ZoneId($value);
    }

    public static function creator(): callable
    {
        return static function () {
            return self::random();
        };
    }

    public static function random(): ZoneId
    {
        return self::create(UuidMother::random());
    }
}
