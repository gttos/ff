<?php

declare(strict_types = 1);

namespace Gtto\Mooc\Moments\Infrastructure\Persistence\Doctrine;

use Gtto\Mooc\Moments\Domain\MomentPlaceId;
use Gtto\Shared\Infrastructure\Persistence\Doctrine\UuidType;

final class MomentPlaceIdType extends UuidType
{
    public static function customTypeName(): string
    {
        return 'place_id';
    }

    protected function typeClassName(): string
    {
        return MomentPlaceId::class;
    }
}
