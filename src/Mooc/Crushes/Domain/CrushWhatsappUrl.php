<?php

declare(strict_types = 1);

namespace Gtto\Mooc\Crushes\Domain;

use Gtto\Shared\Domain\ValueObject\StringValueObject;

final class CrushWhatsappUrl extends StringValueObject
{
    public function isValid(string $whatsapp): bool
    {
        $patter = '(^[0-9]\d{3}[ ]\d{3}[ ]\d{3}$)|(^[+][0-9]\d{1}[ ]\d{1}[ ]\d{4}[ ]\d{4}$)|(^[+][0-9]\d{1}[ ]\d{3}[ ]\d{3}[ ]\d{3}$)|(^[0-9]\d{3}[ ]\d{3}[ ]\d{3}$)|(^[0-9]\d{9}$)|(^[0-9]\d{14}$)|(^([(]([0-9]\d{1})[)][ ])([0-9]\d{3})[ ]\d{4}$)';

        return preg_match($patter, $whatsapp);
    }
}
