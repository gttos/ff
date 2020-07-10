<?php

declare(strict_types = 1);

namespace Gtto\Mooc\Crushes\Infrastructure\Persistence\Doctrine;

use Gtto\Mooc\Crushes\Domain\CrushAssTypesId;
use Gtto\Shared\Infrastructure\Persistence\Doctrine\UuidType;

final class CrushAssTypesIdType extends UuidType
{
    public static function customTypeName(): string
    {
        return 'ass_types_id';
    }

    protected function typeClassName(): string
    {
        return CrushAssTypesId::class;
    }
}
