<?php

declare(strict_types = 1);

namespace Gtto\Mooc\Crushes\Domain;

use Gtto\Shared\Domain\ValueObject\StringValueObject;
use InvalidArgumentException;

final class CrushInstagramUrl extends StringValueObject
{
    public function __construct(string $value)
    {
        $this->ensureIsValidUrl($value);

        parent::__construct($value);
    }

    public function ensureIsValidUrl($value)
    {
        $pattern = "/(?:(?:http|https):\/\/)?(?:www.)?(?:instagram.com|instagr.am)\/([A-Za-z0-9-_]+)/";
        if (!preg_match($pattern, $value)){
            throw new InvalidArgumentException(sprintf('<%s> does not allow the value <%s>.', static::class, $value));
        }
    }
}
