<?php

declare(strict_types = 1);

namespace Gtto\Tests\Mooc\Crushes\Domain;

use Gtto\Mooc\Crushes\Domain\CrushFacebookUrl;
use Gtto\Tests\Shared\Domain\UuidMother;

final class CrushFacebookUrlMother
{
    public static function create(string $value): CrushFacebookUrl
    {
        return new CrushFacebookUrl($value);
    }

    public static function creator(): callable
    {
        return static function () {
            return self::random();
        };
    }

    public static function random(): CrushFacebookUrl
    {
        return self::create('https://www.facebook.com/santiago.gasparotto/');
    }
}
