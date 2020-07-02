<?php

declare(strict_types = 1);

namespace Gtto\Mooc\Users\Domain;

use Gtto\Mooc\Shared\Domain\UserId;

interface UserRepository
{
    public function save(User $user): void;

    public function search(UserId $id): ?User;
}
