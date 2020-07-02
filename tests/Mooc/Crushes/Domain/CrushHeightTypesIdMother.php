<?php

declare(strict_types = 1);

namespace Gtto\Tests\Mooc\Crushes\Domain;

use Gtto\Mooc\Crushes\Domain\CrushHeightTypesId;
use Gtto\Tests\Shared\Domain\UuidMother;

final class CrushHeightTypesIdMother
{
    public static function create(string $value): CrushHeightTypesId
    {
        return new CrushHeightTypesId($value);
    }

    public static function creator(): callable
    {
        return static function () {
            return self::random();
        };
    }

    public static function random(): CrushHeightTypesId
    {
        return self::create(UuidMother::random());
    }
}
