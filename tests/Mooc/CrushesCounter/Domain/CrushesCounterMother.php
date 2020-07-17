<?php

declare(strict_types = 1);

namespace Gtto\Tests\Mooc\CrushesCounter\Domain;

use Gtto\Mooc\CrushesCounter\Domain\CrushesCounter;
use Gtto\Mooc\CrushesCounter\Domain\CrushesCounterId;
use Gtto\Mooc\CrushesCounter\Domain\CrushesCounterTotal;
use Gtto\Mooc\Shared\Domain\CrushId;
use Gtto\Tests\Mooc\Shared\Domain\CrushIdMother;
use Gtto\Tests\Shared\Domain\Repeater;

final class CrushesCounterMother
{
    public static function create(
        CrushesCounterId $id,
        CrushesCounterTotal $total,
        CrushId ...$existingCrushes
    ): CrushesCounter {
        return new CrushesCounter($id, $total, ...$existingCrushes);
    }

    public static function withOne(CrushId $CrushId): CrushesCounter
    {
        return self::create(CrushesCounterIdMother::random(), CrushesCounterTotalMother::one(), $CrushId);
    }

    public static function incrementing(CrushesCounter $existingCounter, CrushId $CrushId): CrushesCounter
    {
        return self::create(
            $existingCounter->id(),
            CrushesCounterTotalMother::create($existingCounter->total()->value() + 1),
            ...array_merge($existingCounter->existingCrushes(), [$CrushId])
        );
    }

    public static function random(): CrushesCounter
    {
        return self::create(
            CrushesCounterIdMother::random(),
            CrushesCounterTotalMother::random(),
            ...Repeater::random(CrushIdMother::creator())
        );
    }
}
