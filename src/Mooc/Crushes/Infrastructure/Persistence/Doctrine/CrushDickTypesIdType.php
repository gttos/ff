<?php

declare(strict_types = 1);

namespace Gtto\Mooc\Crushes\Infrastructure\Persistence\Doctrine;

use Gtto\Mooc\Crushes\Domain\CrushDickTypesId;
use Gtto\Shared\Infrastructure\Persistence\Doctrine\UuidType;

final class CrushDickTypesIdType extends UuidType
{
    public static function customTypeName(): string
    {
        return 'dick_types_id';
    }

    protected function typeClassName(): string
    {
        return CrushDickTypesId::class;
    }
}
