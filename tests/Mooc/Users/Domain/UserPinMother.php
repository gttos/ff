<?php

declare(strict_types = 1);

namespace Gtto\Tests\Mooc\Users\Domain;

use Gtto\Mooc\Users\Domain\UserPin;
use Gtto\Tests\Shared\Domain\IntegerMother;

final class UserPinMother
{
    public static function create(int $value): UserPin
    {
        return new UserPin($value);
    }

    public static function creator(): callable
    {
        return static function () {
            return self::random();
        };
    }

    public static function random(): UserPin
    {
        return self::create(IntegerMother::between(18,80));
    }
}
