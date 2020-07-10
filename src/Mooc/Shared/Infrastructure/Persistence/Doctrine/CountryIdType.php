<?php

declare(strict_types = 1);

namespace Gtto\Mooc\Shared\Infrastructure\Persistence\Doctrine;

use Gtto\Mooc\Shared\Domain\CountryId;
use Gtto\Shared\Infrastructure\Persistence\Doctrine\UuidType;

final class CountryIdType extends UuidType
{
    public static function customTypeName(): string
    {
        return 'country_id';
    }

    protected function typeClassName(): string
    {
        return CountryId::class;
    }
}
