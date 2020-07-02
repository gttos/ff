<?php

declare(strict_types = 1);

namespace Gtto\Mooc\CrushesCounter\Infrastructure\Persistence\Doctrine;

use Gtto\Mooc\CrushesCounter\Domain\CrushesCounterId;
use Gtto\Shared\Infrastructure\Persistence\Doctrine\UuidType;

final class CrushCounterIdType extends UuidType
{
    public static function customTypeName(): string
    {
        return 'crush_counter_id';
    }

    protected function typeClassName(): string
    {
        return CrushesCounterId::class;
    }
}
