<?php

declare(strict_types = 1);

namespace Gtto\Tests\Mooc\Moments\Domain;

use Gtto\Mooc\Moments\Domain\MomentPlaceId;
use Gtto\Tests\Shared\Domain\UuidMother;

final class MomentPlaceIdMother
{
    public static function create(string $value): MomentPlaceId
    {
        return new MomentPlaceId($value);
    }

    public static function creator(): callable
    {
        return static function () {
            return self::random();
        };
    }

    public static function random(): MomentPlaceId
    {
        return self::create(UuidMother::random());
    }
}
