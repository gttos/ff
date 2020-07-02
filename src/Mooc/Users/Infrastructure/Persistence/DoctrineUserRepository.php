<?php

declare(strict_types = 1);

namespace Gtto\Mooc\Users\Infrastructure\Persistence;

use Gtto\Mooc\Users\Domain\User;
use Gtto\Mooc\Users\Domain\UserRepository;
use Gtto\Mooc\Shared\Domain\UserId;
use Gtto\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;

final class DoctrineUserRepository extends DoctrineRepository implements UserRepository
{
    public function save(User $user): void
    {
        $this->persist($user);
    }

    public function search(UserId $id): ?User
    {
        return $this->repository(User::class)->find($id);
    }
}
