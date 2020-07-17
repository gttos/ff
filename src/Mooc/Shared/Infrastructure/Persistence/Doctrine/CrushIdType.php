<?php

declare(strict_types = 1);

namespace Gtto\Mooc\Shared\Infrastructure\Persistence\Doctrine;

use Gtto\Mooc\Shared\Domain\CrushId;
use Gtto\Shared\Infrastructure\Persistence\Doctrine\UuidType;

final class CrushIdType extends UuidType
{
    public static function customTypeName(): string
    {
        return 'crush_id';
    }

    protected function typeClassName(): string
    {
        return CrushId::class;
    }
}
