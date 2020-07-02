<?php

declare(strict_types = 1);

namespace Gtto\Tests\Mooc\CrushesCounter\Domain;

use Gtto\Mooc\CrushesCounter\Domain\CrushesCounterTotal;
use Gtto\Tests\Shared\Domain\IntegerMother;

final class CrushesCounterTotalMother
{
    public static function create(int $value): CrushesCounterTotal
    {
        return new CrushesCounterTotal($value);
    }

    public static function one(): CrushesCounterTotal
    {
        return self::create(1);
    }

    public static function random(): CrushesCounterTotal
    {
        return self::create(IntegerMother::random());
    }
}
