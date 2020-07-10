<?php

declare(strict_types = 1);

namespace Gtto\Mooc\Crushes\Infrastructure\Persistence\Doctrine;

use Gtto\Mooc\Shared\Domain\ZoneId;
use Gtto\Shared\Infrastructure\Persistence\Doctrine\UuidType;

final class ZoneIdType extends UuidType
{
    public static function customTypeName(): string
    {
        return 'zone_id';
    }

    protected function typeClassName(): string
    {
        return ZoneId::class;
    }
}
