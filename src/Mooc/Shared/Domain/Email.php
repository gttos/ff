<?php

declare(strict_types = 1);

namespace Gtto\Mooc\Shared\Domain;

use Gtto\Shared\Domain\ValueObject\StringValueObject;

final class Email extends StringValueObject
{
    public function isValid(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}
