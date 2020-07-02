<?php

declare(strict_types = 1);

namespace Gtto\Tests\Mooc\Shared\Domain;

use Gtto\Mooc\Shared\Domain\CountryId;
use Gtto\Tests\Shared\Domain\UuidMother;

final class CountryIdMother
{
    public static function create(string $value): CountryId
    {
        return new CountryId($value);
    }

    public static function creator(): callable
    {
        return static function () {
            return self::random();
        };
    }

    public static function random(): CountryId
    {
        return self::create(UuidMother::random());
    }
}
