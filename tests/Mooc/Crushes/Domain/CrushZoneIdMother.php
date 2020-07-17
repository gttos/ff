<?php

declare(strict_types = 1);

namespace Gtto\Tests\Mooc\Crushes\Domain;

use Gtto\Mooc\Crushes\Domain\CrushZoneId;
use Gtto\Tests\Shared\Domain\UuidMother;

final class CrushZoneIdMother
{
    public static function create(string $value): CrushZoneId
    {
        return new CrushZoneId($value);
    }

    public static function creator(): callable
    {
        return static function () {
            return self::random();
        };
    }

    public static function random(): CrushZoneId
    {
        return self::create(UuidMother::random());
    }
}
