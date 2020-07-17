<?php

declare(strict_types = 1);

namespace Gtto\Mooc\Moments\Domain;

use Gtto\Shared\Domain\ValueObject\StringValueObject;
use InvalidArgumentException;

final class MomentStory extends StringValueObject
{
    public function __construct(string $value)
    {
        $this->ensureIsValidValue($value);

        parent::__construct($value);
    }

    private function ensureIsValidValue($value){

        if (strlen ($value) > 1000){
            throw new InvalidArgumentException(sprintf('<%s> does not allow more than 1000 characters as a description. <%s> characters sent.', static::class, $value));
        }
    }
}
