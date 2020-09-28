<?php

declare(strict_types = 1);

namespace Gtto\Mooc\Users\Infrastructure\Persistence\Doctrine;

use Gtto\Mooc\Shared\Domain\PlanId;
use Gtto\Shared\Infrastructure\Persistence\Doctrine\UuidType;

final class UserPlanIdType extends UuidType
{
    public static function customTypeName(): string
    {
        return 'plan_id';
    }

    protected function typeClassName(): string
    {
        return PlanId::class;
    }
}
