<?php

declare(strict_types = 1);

namespace Gtto\Tests\Mooc\Moments\Domain;

use Gtto\Mooc\Moments\Domain\MomentRate;
use Gtto\Tests\Shared\Domain\IntegerMother;

final class MomentRateMother
{
    public static function create(int $value): MomentRate
    {
        return new MomentRate($value);
    }

    public static function random(): MomentRate
    {
        return self::create(IntegerMother::between(1,5));
    }
}
