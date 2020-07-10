<?php

declare(strict_types = 1);

namespace Gtto\Mooc\Crushes\Infrastructure\Persistence\Doctrine;

use Gtto\Mooc\Crushes\Domain\CrushInstagramUrl;
use Gtto\Shared\Infrastructure\Persistence\Doctrine\UuidType;

final class CrushInstagramUrlType extends UuidType
{
    public static function customTypeName(): string
    {
        return 'instagram_url';
    }

    protected function typeClassName(): string
    {
        return CrushInstagramUrl::class;
    }
}
