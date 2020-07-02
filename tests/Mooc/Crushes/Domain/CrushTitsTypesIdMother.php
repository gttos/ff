<?php

declare(strict_types = 1);

namespace Gtto\Tests\Mooc\Crushes\Domain;

use Gtto\Mooc\Crushes\Domain\CrushTitsTypesId;
use Gtto\Tests\Shared\Domain\UuidMother;

final class CrushTitsTypesIdMother
{
    public static function create(string $value): CrushTitsTypesId
    {
        return new CrushTitsTypesId($value);
    }

    public static function creator(): callable
    {
        return static function () {
            return self::random();
        };
    }

    public static function random(): CrushTitsTypesId
    {
        return self::create(UuidMother::random());
    }
}
