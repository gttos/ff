<?php

declare(strict_types = 1);

namespace Gtto\Tests\Mooc\Shared\Domain;

use Gtto\Mooc\Shared\Domain\UserId;
use Gtto\Tests\Shared\Domain\UuidMother;

final class UserIdMother
{
    public static function create(string $value): UserId
    {
        return new UserId($value);
    }

    public static function creator(): callable
    {
        return static function () {
            return self::random();
        };
    }

    public static function random(): UserId
    {
        return self::create(UuidMother::random());
    }
}
