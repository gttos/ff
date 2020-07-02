<?php

declare(strict_types = 1);

namespace Gtto\Tests\Mooc\Crushes\Domain;

use Gtto\Mooc\Crushes\Domain\CrushBodyTypesId;
use Gtto\Tests\Shared\Domain\UuidMother;

final class CrushBodyTypesIdMother
{
    public static function create(string $value): CrushBodyTypesId
    {
        return new CrushBodyTypesId($value);
    }

    public static function creator(): callable
    {
        return static function () {
            return self::random();
        };
    }

    public static function random(): CrushBodyTypesId
    {
        return self::create(UuidMother::random());
    }
}
