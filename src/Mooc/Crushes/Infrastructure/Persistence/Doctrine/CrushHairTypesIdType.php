<?php

declare(strict_types = 1);

namespace Gtto\Mooc\Crushes\Infrastructure\Persistence\Doctrine;

use Gtto\Mooc\Crushes\Domain\CrushHairTypesId;
use Gtto\Shared\Infrastructure\Persistence\Doctrine\UuidType;

final class CrushHairTypesIdType extends UuidType
{
    public static function customTypeName(): string
    {
        return 'hair_types_id';
    }

    protected function typeClassName(): string
    {
        return CrushHairTypesId::class;
    }
}
