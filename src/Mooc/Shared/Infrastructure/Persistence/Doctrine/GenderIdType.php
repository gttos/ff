<?php

declare(strict_types = 1);

namespace Gtto\Mooc\Shared\Infrastructure\Persistence\Doctrine;

use Gtto\Mooc\Shared\Domain\GenderId;
use Gtto\Shared\Infrastructure\Persistence\Doctrine\UuidType;

final class GenderIdType extends UuidType
{
    public static function customTypeName(): string
    {
        return 'gender_id';
    }

    protected function typeClassName(): string
    {
        return GenderId::class;
    }
}
