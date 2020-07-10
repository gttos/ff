<?php

declare(strict_types = 1);

namespace Gtto\Mooc\Crushes\Domain;

use Gtto\Shared\Domain\ValueObject\StringValueObject;
use InvalidArgumentException;

final class CrushWhatsappUrl extends StringValueObject
{
//    TODO: Validate Whatsapp URL
//    public function __construct(string $value)
//    {
//        $this->ensureIsValidUrl($value);
//
//        parent::__construct($value);
//    }

//    public function ensureIsValidUrl(string $value): bool
//    {
//        $pattern = '/(^[0-9]\d{3}[ ]\d{3}[ ]\d{3}$)|(^[+][0-9]\d{1}[ ]\d{1}[ ]\d{4}[ ]\d{4}$)|(^[+][0-9]\d{1}[ ]\d{3}[ ]\d{3}[ ]\d{3}$)|(^[0-9]\d{3}[ ]\d{3}[ ]\d{3}$)|(^[0-9]\d{9}$)|(^[0-9]\d{14}$)|(^([(]([0-9]\d{1})[)][ ])([0-9]\d{3})[ ]\d{4}$)/';
//        if (!preg_match($pattern, $value)){
//            throw new InvalidArgumentException(sprintf('<%s> does not allow the value <%s>.', static::class, $value));
//        }
//    }
}
