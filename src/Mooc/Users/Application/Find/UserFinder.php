<?php

declare(strict_types = 1);

namespace Gtto\Mooc\Users\Application\Find;

use Gtto\Mooc\Users\Domain\User;
use Gtto\Mooc\Users\Domain\UserNotExist;
use Gtto\Mooc\Users\Domain\UserRepository;
use Gtto\Mooc\Shared\Domain\UserId;

final class UserFinder
{
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(UserId $id): User
    {
        $User = $this->repository->search($id);

        if (null === $User) {
            throw new UserNotExist($id);
        }

        return $User;
    }
}
