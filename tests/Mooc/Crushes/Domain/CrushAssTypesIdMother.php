<?php

declare(strict_types = 1);

namespace Gtto\Tests\Mooc\Crushes\Domain;

use Gtto\Mooc\Crushes\Domain\CrushAssTypesId;
use Gtto\Tests\Shared\Domain\UuidMother;

final class CrushAssTypesIdMother
{
    public static function create(string $value): CrushAssTypesId
    {
        return new CrushAssTypesId($value);
    }

    public static function creator(): callable
    {
        return static function () {
            return self::random();
        };
    }

    public static function random(): CrushAssTypesId
    {
        return self::create(UuidMother::random());
    }
}
