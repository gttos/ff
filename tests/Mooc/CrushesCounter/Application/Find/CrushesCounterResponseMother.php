<?php

declare(strict_types = 1);

namespace Gtto\Tests\Mooc\CrushesCounter\Application\Find;

use Gtto\Mooc\CrushesCounter\Application\Find\CrushesCounterResponse;
use Gtto\Mooc\CrushesCounter\Domain\CrushesCounterTotal;
use Gtto\Tests\Mooc\CrushesCounter\Domain\CrushesCounterTotalMother;

final class CrushesCounterResponseMother
{
    public static function create(CrushesCounterTotal $total): CrushesCounterResponse
    {
        return new CrushesCounterResponse($total->value());
    }

    public static function random(): CrushesCounterResponse
    {
        return self::create(CrushesCounterTotalMother::random());
    }
}
