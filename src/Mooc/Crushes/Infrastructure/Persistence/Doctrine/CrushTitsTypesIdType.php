<?php

declare(strict_types = 1);

namespace Gtto\Mooc\Crushes\Infrastructure\Persistence\Doctrine;

use Gtto\Mooc\Crushes\Domain\CrushTitsTypesId;
use Gtto\Shared\Infrastructure\Persistence\Doctrine\UuidType;

final class CrushTitsTypesIdType extends UuidType
{
    public static function customTypeName(): string
    {
        return 'tits_types_id';
    }

    protected function typeClassName(): string
    {
        return CrushTitsTypesId::class;
    }
}
