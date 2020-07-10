<?php

declare(strict_types = 1);

namespace Gtto\Tests\Mooc\Crushes\Domain;

use Gtto\Mooc\Crushes\Domain\CrushInstagramUrl;
use Gtto\Tests\Shared\Domain\UuidMother;

final class CrushInstagramUrlMother
{
    public static function create(string $value): CrushInstagramUrl
    {
        return new CrushInstagramUrl($value);
    }

    public static function creator(): callable
    {
        return static function () {
            return self::random();
        };
    }

    public static function random(): CrushInstagramUrl
    {
        return self::create('https://www.instagram.com/gttosantiago/');
    }
}
