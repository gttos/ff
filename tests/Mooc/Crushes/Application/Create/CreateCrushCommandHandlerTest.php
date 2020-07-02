<?php

declare(strict_types = 1);

namespace Gtto\Tests\Mooc\Crushes\Application\Create;

use Gtto\Mooc\Crushes\Application\Create\CrushCreator;
use Gtto\Mooc\Crushes\Application\Create\CreateCrushCommandHandler;
use Gtto\Tests\Mooc\Crushes\CrushesModuleUnitTestCase;
use Gtto\Tests\Mooc\Crushes\Domain\CrushCreatedDomainEventMother;
use Gtto\Tests\Mooc\Crushes\Domain\CrushMother;

final class CreateCrushCommandHandlerTest extends crushesModuleUnitTestCase
{
    private $handler;

    protected function setUp(): void
    {
        parent::setUp();

        $this->handler = new CreateCrushCommandHandler(new crushCreator($this->repository(), $this->eventBus()));
    }

    /** @test */
    public function it_should_create_a_valid_crush(): void
    {
        $command = CreateCrushCommandMother::random();

        $crush          = CrushMother::fromRequest($command);
        $domainEvent    = CrushCreatedDomainEventMother::fromcrush($crush);

        $this->shouldSave($crush);
        $this->shouldPublishDomainEvent($domainEvent);

        $this->dispatch($command, $this->handler);
    }
}
