<?php

declare(strict_types = 1);

namespace Gtto\Mooc\Users\Application\Update;

use Gtto\Mooc\Users\Application\Find\UserFinder;
use Gtto\Mooc\Users\Domain\UserFullName;
use Gtto\Mooc\Users\Domain\UserRepository;
use Gtto\Mooc\Shared\Domain\UserId;
use Gtto\Shared\Domain\Bus\Event\EventBus;

final class UserRenamer
{
    private $repository;
    private $finder;
    private $bus;

    public function __construct(UserRepository $repository, EventBus $bus)
    {
        $this->repository = $repository;
        $this->finder     = new UserFinder($repository);
        $this->bus        = $bus;
    }

    public function __invoke(UserId $id, UserFullName $newName): void
    {
        $User = $this->finder->__invoke($id);

        $User->rename($newName);

        $this->repository->save($User);
        $this->bus->publish(...$User->pullDomainEvents());
    }
}
