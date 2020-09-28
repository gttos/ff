<?php

declare(strict_types = 1);

namespace Gtto\Tests\Mooc\Users\Infrastructure\Persistence;

use Doctrine\ORM\EntityManager;
use Gtto\Mooc\Users\Domain\UserRepository;
use Gtto\Mooc\Users\Infrastructure\Persistence\DoctrineUserRepository;
use Gtto\Tests\Mooc\Users\Domain\UserMother;
use Gtto\Tests\Mooc\Users\UsersModuleInfrastructureTestCase;
use Gtto\Tests\Mooc\Shared\Domain\UserIdMother;

final class DoctrineUserRepositoryTest extends UsersModuleInfrastructureTestCase
{
    /** @test */
    public function it_should_save_a_user(): void
    {
        $user = UserMother::random();

        $this->doctrineRepository()->save($user);
        $this->clearUnitOfWork();
    }

    /** @test */
    public function it_should_return_an_existing_user(): void
    {
        $user = UserMother::random();

        $this->doctrineRepository()->save($user);
        $this->clearUnitOfWork();

        $this->assertEquals($user, $this->doctrineRepository()->search($user->id()));
    }

    /** @test */
    public function it_should_not_return_a_non_existing_user(): void
    {
        $this->assertNull($this->doctrineRepository()->search(UserIdMother::random()));
    }

    private function doctrineRepository(): UserRepository
    {
        return new DoctrineUserRepository($this->service(EntityManager::class));
    }
}
