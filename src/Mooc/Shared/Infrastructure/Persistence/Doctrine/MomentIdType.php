<?php

declare(strict_types = 1);

namespace Gtto\Mooc\Shared\Infrastructure\Persistence\Doctrine;

use Gtto\Mooc\Shared\Domain\MomentId;
use Gtto\Shared\Infrastructure\Persistence\Doctrine\UuidType;

final class MomentIdType extends UuidType
{
    public static function customTypeName(): string
    {
        return 'moment_id';
    }

    protected function typeClassName(): string
    {
        return MomentId::class;
    }
}
