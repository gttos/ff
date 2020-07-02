<?php

declare(strict_types = 1);

namespace Gtto\Tests\Mooc\Crushes\Domain;

use Gtto\Mooc\Crushes\Domain\CrushHairTypesId;
use Gtto\Mooc\Crushes\Domain\CrushSkinTypesId;
use Gtto\Tests\Shared\Domain\UuidMother;

final class CrushSkinTypesIdMother
{
    public static function create(string $value): CrushSkinTypesId
    {
        return new CrushSkinTypesId($value);
    }

    public static function creator(): callable
    {
        return static function () {
            return self::random();
        };
    }

    public static function random(): CrushSkinTypesId
    {
        return self::create(UuidMother::random());
    }
}
