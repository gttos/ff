<?php

declare(strict_types=1);

namespace Gtto\Backoffice\Auth\Domain;

interface AuthRepository
{
    public function search(AuthUsername $username): ?AuthUser;
}
