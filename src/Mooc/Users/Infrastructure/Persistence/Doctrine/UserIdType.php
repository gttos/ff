<?php

declare(strict_types = 1);

namespace Gtto\Mooc\Users\Infrastructure\Persistence\Doctrine;

use Gtto\Mooc\Shared\Domain\User\UserId;
use Gtto\Shared\Infrastructure\Persistence\Doctrine\UuidType;

final class UserIdType extends UuidType
{
    public static function customTypeName(): string
    {
        return 'User_id';
    }

    protected function typeClassName(): string
    {
        return UserId::class;
    }
}
