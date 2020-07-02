<?php

declare(strict_types = 1);

namespace Gtto\Tests\Mooc\Crushes\Domain;

use Gtto\Mooc\Crushes\Domain\CrushEyeTypesId;
use Gtto\Tests\Shared\Domain\UuidMother;

final class CrushEyeTypesIdMother
{
    public static function create(string $value): CrushEyeTypesId
    {
        return new CrushEyeTypesId($value);
    }

    public static function creator(): callable
    {
        return static function () {
            return self::random();
        };
    }

    public static function random(): CrushEyeTypesId
    {
        return self::create(UuidMother::random());
    }
}
