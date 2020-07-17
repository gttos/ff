<?php

declare(strict_types = 1);

namespace Gtto\Mooc\Shared\Infrastructure\Persistence\Doctrine;

use Gtto\Mooc\Shared\Domain\UserId;
use Gtto\Shared\Infrastructure\Persistence\Doctrine\UuidType;

final class UserIdType extends UuidType
{
    public static function customTypeName(): string
    {
        return 'user_id';
    }

    protected function typeClassName(): string
    {
        return UserId::class;
    }
}
