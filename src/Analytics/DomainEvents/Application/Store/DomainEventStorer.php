<?php

declare(strict_types=1);

namespace Gtto\Analytics\DomainEvents\Application\Store;

use Gtto\Analytics\DomainEvents\Domain\AnalyticsDomainEvent;
use Gtto\Analytics\DomainEvents\Domain\AnalyticsDomainEventAggregateId;
use Gtto\Analytics\DomainEvents\Domain\AnalyticsDomainEventBody;
use Gtto\Analytics\DomainEvents\Domain\AnalyticsDomainEventId;
use Gtto\Analytics\DomainEvents\Domain\AnalyticsDomainEventName;
use Gtto\Analytics\DomainEvents\Domain\DomainEventsRepository;

final class DomainEventStorer
{
    private DomainEventsRepository $repository;

    public function __construct(DomainEventsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function store(
        AnalyticsDomainEventId $id,
        AnalyticsDomainEventAggregateId $aggregateId,
        AnalyticsDomainEventName $name,
        AnalyticsDomainEventBody $body
    ): void {
        $domainEvent = new AnalyticsDomainEvent($id, $aggregateId, $name, $body);

        $this->repository->save($domainEvent);
    }
}
