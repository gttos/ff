<?php

declare(strict_types = 1);

namespace Gtto\Tests\Mooc\Crushes\Domain;

use Gtto\Mooc\Crushes\Domain\CrushWhatsappUrl;
use Gtto\Tests\Shared\Domain\UuidMother;

final class CrushWhatsappUrlMother
{
    public static function create(string $value): CrushWhatsappUrl
    {
        return new CrushWhatsappUrl($value);
    }

    public static function creator(): callable
    {
        return static function () {
            return self::random();
        };
    }

    public static function random(): CrushWhatsappUrl
    {
        return self::create(UuidMother::random());
    }
}
