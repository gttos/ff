<?php

declare(strict_types = 1);

namespace Gtto\Tests\Mooc\CrushesCounter\Application\Increment;

use Gtto\Mooc\CrushesCounter\Application\Increment\CrushesCounterIncrementer;
use Gtto\Mooc\CrushesCounter\Application\Increment\IncrementCrushesCounterOnCrushCreated;
use Gtto\Tests\Mooc\Crushes\Domain\CrushCreatedDomainEventMother;
use Gtto\Tests\Mooc\Crushes\Domain\CrushIdMother;
use Gtto\Tests\Mooc\CrushesCounter\CrushesCounterModuleUnitTestCase;
use Gtto\Tests\Mooc\CrushesCounter\Domain\CrushesCounterIncrementedDomainEventMother;
use Gtto\Tests\Mooc\CrushesCounter\Domain\CrushesCounterMother;

final class IncrementCrushesCounterOnCrushCreatedTest extends CrushesCounterModuleUnitTestCase
{
    private $subscriber;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subscriber = new IncrementCrushesCounterOnCrushCreated(
            new CrushesCounterIncrementer(
                $this->repository(),
                $this->uuidGenerator(),
                $this->eventBus()
            )
        );
    }

    /** @test */
    public function it_should_initialize_a_new_counter(): void
    {
        $event = CrushCreatedDomainEventMother::random();

        $CrushId    = CrushIdMother::create($event->aggregateId());
        $newCounter  = CrushesCounterMother::withOne($CrushId);
        $domainEvent = CrushesCounterIncrementedDomainEventMother::fromCounter($newCounter);

        $this->shouldSearch(null);
        $this->shouldGenerateUuid($newCounter->id()->value());
        $this->shouldSave($newCounter);
        $this->shouldPublishDomainEvent($domainEvent);

        $this->notify($event, $this->subscriber);
    }

    /** @test */
    public function it_should_increment_an_existing_counter(): void
    {
        $event = CrushCreatedDomainEventMother::random();

        $CrushId           = CrushIdMother::create($event->aggregateId());
        $existingCounter    = CrushesCounterMother::random();
        $incrementedCounter = CrushesCounterMother::incrementing($existingCounter, $CrushId);
        $domainEvent        = CrushesCounterIncrementedDomainEventMother::fromCounter($incrementedCounter);

        $this->shouldSearch($existingCounter);
        $this->shouldSave($incrementedCounter);
        $this->shouldPublishDomainEvent($domainEvent);

        $this->notify($event, $this->subscriber);
    }

    /** @test */
    public function it_should_not_increment_an_already_incremented_crush(): void
    {
        $event = CrushCreatedDomainEventMother::random();

        $CrushId        = CrushIdMother::create($event->aggregateId());
        $existingCounter = CrushesCounterMother::withOne($CrushId);

        $this->shouldSearch($existingCounter);

        $this->notify($event, $this->subscriber);
    }
}
