<?php

declare(strict_types=1);

namespace Gtto\Analytics\DomainEvents\Application\Store;

use Gtto\Analytics\DomainEvents\Domain\AnalyticsDomainEventAggregateId;
use Gtto\Analytics\DomainEvents\Domain\AnalyticsDomainEventBody;
use Gtto\Analytics\DomainEvents\Domain\AnalyticsDomainEventId;
use Gtto\Analytics\DomainEvents\Domain\AnalyticsDomainEventName;
use Gtto\Shared\Domain\Bus\Event\DomainEvent;
use Gtto\Shared\Domain\Bus\Event\DomainEventSubscriber;

final class StoreDomainEventOnOccurred implements DomainEventSubscriber
{
    private DomainEventStorer $storer;

    public function __construct(DomainEventStorer $storer)
    {
        $this->storer = $storer;
    }

    public static function subscribedTo(): array
    {
        return [DomainEvent::class];
    }

    public function __invoke(DomainEvent $event): void
    {
        $id          = new AnalyticsDomainEventId($event->eventId());
        $aggregateId = new AnalyticsDomainEventAggregateId($event->aggregateId());
        $name        = new AnalyticsDomainEventName($event::eventName());
        $body        = new AnalyticsDomainEventBody($event->toPrimitives());

        $this->storer->store($id, $aggregateId, $name, $body);
    }
}
