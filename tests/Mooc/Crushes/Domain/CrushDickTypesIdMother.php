<?php

declare(strict_types = 1);

namespace Gtto\Tests\Mooc\Crushes\Domain;

use Gtto\Mooc\Crushes\Domain\CrushDickTypesId;
use Gtto\Tests\Shared\Domain\UuidMother;

final class CrushDickTypesIdMother
{
    public static function create(string $value): CrushDickTypesId
    {
        return new CrushDickTypesId($value);
    }

    public static function creator(): callable
    {
        return static function () {
            return self::random();
        };
    }

    public static function random(): CrushDickTypesId
    {
        return self::create(UuidMother::random());
    }
}
