<?php

declare(strict_types = 1);

namespace Gtto\Tests\Mooc\Moments\Application\Create;

use Gtto\Mooc\Moments\Application\Create\MomentCreator;
use Gtto\Mooc\Moments\Application\Create\CreateMomentCommandHandler;
use Gtto\Tests\Mooc\Moments\MomentsModuleUnitTestCase;
use Gtto\Tests\Mooc\Moments\Domain\MomentCreatedDomainEventMother;
use Gtto\Tests\Mooc\Moments\Domain\MomentMother;

final class CreateMomentCommandHandlerTest extends MomentsModuleUnitTestCase
{
    private $handler;

    protected function setUp(): void
    {
        parent::setUp();

        $this->handler = new CreateMomentCommandHandler(new MomentCreator($this->repository(), $this->eventBus()));
    }

    /** @test */
    public function it_should_create_a_valid_moment(): void
    {
        $command = CreateMomentCommandMother::random();

        $moment         = MomentMother::fromRequest($command);
        $domainEvent    = MomentCreatedDomainEventMother::frommoment($moment);

        $this->shouldSave($moment);
        $this->shouldPublishDomainEvent($domainEvent);

        $this->dispatch($command, $this->handler);
    }
}
