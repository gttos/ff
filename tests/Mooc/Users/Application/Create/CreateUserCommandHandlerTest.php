<?php

declare(strict_types = 1);

namespace Gtto\Tests\Mooc\Users\Application\Create;

use Gtto\Mooc\Users\Application\Create\UserCreator;
use Gtto\Mooc\Users\Application\Create\CreateUserCommandHandler;
use Gtto\Tests\Mooc\Users\UsersModuleUnitTestCase;
use Gtto\Tests\Mooc\Users\Domain\UserCreatedDomainEventMother;
use Gtto\Tests\Mooc\Users\Domain\UserMother;

final class CreateUserCommandHandlerTest extends UsersModuleUnitTestCase
{
    private $handler;

    protected function setUp(): void
    {
        parent::setUp();

        $this->handler = new CreateUserCommandHandler(new UserCreator($this->repository(), $this->eventBus()));
    }

    /** @test */
    public function it_should_create_a_valid_user(): void
    {
        $command = CreateUserCommandMother::random();

        $user         = UserMother::fromRequest($command);
        $domainEvent    = UserCreatedDomainEventMother::fromUser($user);

        $this->shouldSave($user);
        $this->shouldPublishDomainEvent($domainEvent);

        $this->dispatch($command, $this->handler);
    }
}
