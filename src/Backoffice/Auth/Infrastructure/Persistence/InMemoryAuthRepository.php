<?php

declare(strict_types=1);

namespace Gtto\Backoffice\Auth\Infrastructure\Persistence;

use Gtto\Backoffice\Auth\Domain\AuthPassword;
use Gtto\Backoffice\Auth\Domain\AuthRepository;
use Gtto\Backoffice\Auth\Domain\AuthUser;
use Gtto\Backoffice\Auth\Domain\AuthUsername;
use function Lambdish\Phunctional\get;

final class InMemoryAuthRepository implements AuthRepository
{
    private const USERS = [
        'javi' => 'barbitas',
        'rafa' => 'pelazo',
    ];

    public function search(AuthUsername $username): ?AuthUser
    {
        $password = get($username->value(), self::USERS);

        return null !== $password ? new AuthUser($username, new AuthPassword($password)) : null;
    }
}
