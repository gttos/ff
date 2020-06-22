<?php

declare(strict_types=1);

namespace Gtto\Tests\Backoffice\Auth\Application\Authenticate;

use Gtto\Backoffice\Auth\Application\Authenticate\AuthenticateUserCommand;
use Gtto\Backoffice\Auth\Domain\AuthPassword;
use Gtto\Backoffice\Auth\Domain\AuthUsername;
use Gtto\Tests\Backoffice\Auth\Domain\AuthPasswordMother;
use Gtto\Tests\Backoffice\Auth\Domain\AuthUsernameMother;

final class AuthenticateUserCommandMother
{
    public static function create(AuthUsername $username, AuthPassword $password): AuthenticateUserCommand
    {
        return new AuthenticateUserCommand($username->value(), $password->value());
    }

    public static function random(): AuthenticateUserCommand
    {
        return self::create(AuthUsernameMother::random(), AuthPasswordMother::random());
    }
}
