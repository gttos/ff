<?php

declare(strict_types = 1);

namespace Gtto\Mooc\Moments\Infrastructure\Persistence\Doctrine;

use Doctrine\DBAL\Types\StringType;
use Gtto\Mooc\Moments\Domain\MomentRate;

final class MomentRateType extends StringType
{
    public static function customTypeName(): string
    {
        return 'rate';
    }

    protected function typeClassName(): string
    {
        return MomentRate::class;
    }
}
