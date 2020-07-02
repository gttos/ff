<?php

declare(strict_types = 1);

namespace Gtto\Tests\Mooc\Shared\Domain;

use Gtto\Mooc\Shared\Domain\GenderId;
use Gtto\Tests\Shared\Domain\UuidMother;

final class GenderIdMother
{
    public static function create(string $value): GenderId
    {
        return new GenderId($value);
    }

    public static function creator(): callable
    {
        return static function () {
            return self::random();
        };
    }

    public static function random(): GenderId
    {
        return self::create(UuidMother::random());
    }
}
