<?php

declare(strict_types = 1);

namespace Gtto\Mooc\Crushes\Infrastructure\Persistence\Doctrine;

use Gtto\Mooc\Crushes\Domain\CrushWhatsappUrl;
use Gtto\Shared\Infrastructure\Persistence\Doctrine\UuidType;

final class CrushWhatsappUrlType extends UuidType
{
    public static function customTypeName(): string
    {
        return 'whatsapp_url';
    }

    protected function typeClassName(): string
    {
        return CrushWhatsappUrl::class;
    }
}
