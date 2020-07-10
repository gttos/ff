<?php

declare(strict_types = 1);

namespace Gtto\Mooc\Crushes\Infrastructure\Persistence\Doctrine;

use Gtto\Mooc\Crushes\Domain\CrushHeightTypesId;
use Gtto\Shared\Infrastructure\Persistence\Doctrine\UuidType;

final class CrushHeightTypesIdType extends UuidType
{
    public static function customTypeName(): string
    {
        return 'height_types_id';
    }

    protected function typeClassName(): string
    {
        return CrushHeightTypesId::class;
    }
}
