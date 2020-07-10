<?php

declare(strict_types = 1);

namespace Gtto\Mooc\Crushes\Infrastructure\Persistence\Doctrine;

use Gtto\Mooc\Crushes\Domain\CrushFacebookUrl;
use Gtto\Shared\Infrastructure\Persistence\Doctrine\UuidType;

final class CrushFacebookUrlType extends UuidType
{
    public static function customTypeName(): string
    {
        return 'facebook_url';
    }

    protected function typeClassName(): string
    {
        return CrushFacebookUrl::class;
    }
}
