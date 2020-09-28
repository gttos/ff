<?php

declare(strict_types = 1);

namespace Gtto\Tests\Mooc\Users\Domain;

use Gtto\Mooc\Users\Domain\UserFullName;
use Gtto\Tests\Shared\Domain\WordMother;

final class UserFullNameMother
{
    public static function create(string $value): UserFullName
    {
        return new UserFullName($value);
    }

    public static function creator(): callable
    {
        return static function () {
            return self::random();
        };
    }

    public static function random(): UserFullName
    {
        return self::create(WordMother::random());
    }
}
