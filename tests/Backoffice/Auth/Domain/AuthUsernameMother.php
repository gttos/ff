<?php

declare(strict_types=1);

namespace Gtto\Tests\Backoffice\Auth\Domain;

use Gtto\Backoffice\Auth\Domain\AuthUsername;
use Gtto\Tests\Shared\Domain\WordMother;

final class AuthUsernameMother
{
    public static function create(string $value): AuthUsername
    {
        return new AuthUsername($value);
    }

    public static function random(): AuthUsername
    {
        return self::create(WordMother::random());
    }
}
