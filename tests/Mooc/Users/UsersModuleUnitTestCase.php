<?php

declare(strict_types = 1);

namespace Gtto\Tests\Mooc\Users;

use Gtto\Mooc\Users\Domain\User;
use Gtto\Mooc\Users\Domain\UserRepository;
use Gtto\Mooc\Shared\Domain\UserId;
use Gtto\Tests\Shared\Infrastructure\PhpUnit\UnitTestCase;
use Mockery\MockInterface;

abstract class UsersModuleUnitTestCase extends UnitTestCase
{
    private $repository;

    protected function shouldSave(User $user): void
    {
        $this->repository()
            ->shouldReceive('save')
            ->with($this->similarTo($user))
            ->once()
            ->andReturnNull();
    }

    protected function shouldSearch(UserId $id, ?User $user): void
    {
        $this->repository()
            ->shouldReceive('search')
            ->with($this->similarTo($id))
            ->once()
            ->andReturn($user);
    }

    /** @return UserRepository|MockInterface */
    protected function repository(): MockInterface
    {
        return $this->repository = $this->repository ?: $this->mock(UserRepository::class);
    }
}
