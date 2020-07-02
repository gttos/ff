<?php

declare(strict_types = 1);

namespace Gtto\Tests\Mooc\Crushes\Domain;

use Gtto\Mooc\Crushes\Domain\CrushHairTypesId;
use Gtto\Tests\Shared\Domain\UuidMother;

final class CrushHairTypesIdMother
{
    public static function create(string $value): CrushHairTypesId
    {
        return new CrushHairTypesId($value);
    }

    public static function creator(): callable
    {
        return static function () {
            return self::random();
        };
    }

    public static function random(): CrushHairTypesId
    {
        return self::create(UuidMother::random());
    }
}
