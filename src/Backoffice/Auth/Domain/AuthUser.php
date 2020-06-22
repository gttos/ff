<?php

declare(strict_types=1);

namespace Gtto\Backoffice\Auth\Domain;

final class AuthUser
{
    private AuthUsername $username;
    private AuthPassword $password;

    public function __construct(AuthUsername $username, AuthPassword $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function passwordMatches(AuthPassword $password): bool
    {
        return $this->password->isEquals($password);
    }

    public function username(): AuthUsername
    {
        return $this->username;
    }
}
