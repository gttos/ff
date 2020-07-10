<?php

declare(strict_types = 1);

namespace Gtto\Mooc\Crushes\Infrastructure\Persistence\Doctrine;

use Gtto\Mooc\Crushes\Domain\CrushSkinTypesId;
use Gtto\Shared\Infrastructure\Persistence\Doctrine\UuidType;

final class CrushSkinTypesIdType extends UuidType
{
    public static function customTypeName(): string
    {
        return 'skin_types_id';
    }

    protected function typeClassName(): string
    {
        return CrushSkinTypesId::class;
    }
}
