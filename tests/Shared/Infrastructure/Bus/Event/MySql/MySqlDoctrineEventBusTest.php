<?php

declare(strict_types=1);

namespace Gtto\Tests\Shared\Infrastructure\Bus\Event\MySql;

use Gtto\Shared\Domain\Bus\Event\DomainEvent;
use Gtto\Shared\Infrastructure\Bus\Event\DomainEventMapping;
use Gtto\Shared\Infrastructure\Bus\Event\MySql\MySqlDoctrineDomainEventsConsumer;
use Gtto\Shared\Infrastructure\Bus\Event\MySql\MySqlDoctrineEventBus;
use Gtto\Tests\Mooc\Crushes\Domain\CrushCreatedDomainEventMother;
use Gtto\Tests\Mooc\CrushesCounter\Domain\CrushesCounterIncrementedDomainEventMother;
use Gtto\Tests\Shared\Infrastructure\PhpUnit\InfrastructureTestCase;
use Doctrine\ORM\EntityManager;

final class MySqlDoctrineEventBusTest extends InfrastructureTestCase
{
    private $bus;
    private $consumer;

    protected function setUp(): void
    {
        parent::setUp();

        $this->bus      = new MySqlDoctrineEventBus($this->service(EntityManager::class));
        $this->consumer = new MySqlDoctrineDomainEventsConsumer(
            $this->service(EntityManager::class),
            $this->service(DomainEventMapping::class)
        );
    }

    /** @test */
    public function it_should_publish_and_consume_domain_events_from_msql(): void
    {
        $domainEvent        = CrushCreatedDomainEventMother::random();
        $anotherDomainEvent = CrushesCounterIncrementedDomainEventMother::random();

        $this->bus->publish($domainEvent, $anotherDomainEvent);

        $this->consumer->consume(
            fn(DomainEvent ...$expectedEvents) => $this->assertContainsEquals($domainEvent, $expectedEvents),
            $eventsToConsume = 2
        );
    }
}
