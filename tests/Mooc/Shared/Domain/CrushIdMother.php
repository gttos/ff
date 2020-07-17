<?php

declare(strict_types = 1);

namespace Gtto\Tests\Mooc\Shared\Domain;

use Gtto\Mooc\Shared\Domain\CrushId;
use Gtto\Tests\Shared\Domain\UuidMother;

final class CrushIdMother
{
    public static function create(string $value): CrushId
    {
        return new CrushId($value);
    }

    public static function creator(): callable
    {
        return static function () {
            return self::random();
        };
    }

    public static function random(): CrushId
    {
        return self::create(UuidMother::random());
    }
}
