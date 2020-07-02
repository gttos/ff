<?php

declare(strict_types = 1);

namespace Gtto\Tests\Mooc\CrushesCounter\Domain;

use Gtto\Mooc\CrushesCounter\Domain\CrushesCounterId;
use Gtto\Tests\Shared\Domain\UuidMother;

final class CrushesCounterIdMother
{
    public static function create(string $value): CrushesCounterId
    {
        return new CrushesCounterId($value);
    }

    public static function random(): CrushesCounterId
    {
        return self::create(UuidMother::random());
    }
}
