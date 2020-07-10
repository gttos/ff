<?php

declare(strict_types = 1);

namespace Gtto\Mooc\Crushes\Infrastructure\Persistence\Doctrine;

use Gtto\Mooc\Crushes\Domain\CrushEyesTypesId;
use Gtto\Shared\Infrastructure\Persistence\Doctrine\UuidType;

final class CrushEyesTypesIdType extends UuidType
{
    public static function customTypeName(): string
    {
        return 'eyes_types_id';
    }

    protected function typeClassName(): string
    {
        return CrushEyesTypesId::class;
    }
}
