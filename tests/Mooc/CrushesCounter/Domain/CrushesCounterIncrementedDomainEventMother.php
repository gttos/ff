<?php

declare(strict_types = 1);

namespace Gtto\Tests\Mooc\CrushesCounter\Domain;

use Gtto\Mooc\CrushesCounter\Domain\CrushesCounter;
use Gtto\Mooc\CrushesCounter\Domain\CrushesCounterId;
use Gtto\Mooc\CrushesCounter\Domain\CrushesCounterIncrementedDomainEvent;
use Gtto\Mooc\CrushesCounter\Domain\CrushesCounterTotal;

final class CrushesCounterIncrementedDomainEventMother
{
    public static function create(
        CrushesCounterId $id,
        CrushesCounterTotal $total
    ): CrushesCounterIncrementedDomainEvent {
        return new CrushesCounterIncrementedDomainEvent($id->value(), $total->value());
    }

    public static function fromCounter(CrushesCounter $counter): CrushesCounterIncrementedDomainEvent
    {
        return self::create($counter->id(), $counter->total());
    }

    public static function random(): CrushesCounterIncrementedDomainEvent
    {
        return self::create(CrushesCounterIdMother::random(), CrushesCounterTotalMother::random());
    }
}
