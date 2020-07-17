<?php

declare(strict_types = 1);

namespace Gtto\Tests\Mooc\Moments\Domain;

use Gtto\Mooc\Shared\Domain\MomentId;
use Gtto\Tests\Shared\Domain\UuidMother;

final class MomentIdMother
{
    public static function create(string $value): MomentId
    {
        return new MomentId($value);
    }

    public static function creator(): callable
    {
        return static function () {
            return self::random();
        };
    }

    public static function random(): MomentId
    {
        return self::create(UuidMother::random());
    }
}
