<?php

declare(strict_types = 1);

namespace Gtto\Tests\Mooc\Crushes\Domain;

use Gtto\Mooc\Crushes\Domain\CrushEyesTypesId;
use Gtto\Tests\Shared\Domain\UuidMother;

final class CrushEyesTypesIdMother
{
    public static function create(string $value): CrushEyesTypesId
    {
        return new CrushEyesTypesId($value);
    }

    public static function creator(): callable
    {
        return static function () {
            return self::random();
        };
    }

    public static function random(): CrushEyesTypesId
    {
        return self::create(UuidMother::random());
    }
}
