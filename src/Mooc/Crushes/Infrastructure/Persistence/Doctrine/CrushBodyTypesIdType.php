<?php

declare(strict_types = 1);

namespace Gtto\Mooc\Crushes\Infrastructure\Persistence\Doctrine;

use Gtto\Mooc\Crushes\Domain\CrushBodyTypesId;
use Gtto\Shared\Infrastructure\Persistence\Doctrine\UuidType;

final class CrushBodyTypesIdType extends UuidType
{
    public static function customTypeName(): string
    {
        return 'body_types_id';
    }

    protected function typeClassName(): string
    {
        return CrushBodyTypesId::class;
    }
}
