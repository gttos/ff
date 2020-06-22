<?php

declare(strict_types=1);

namespace Gtto\Analytics\DomainEvents\Domain;

final class AnalyticsDomainEvent
{
    private AnalyticsDomainEventId          $id;
    private AnalyticsDomainEventAggregateId $aggregateId;
    private AnalyticsDomainEventName        $name;
    private AnalyticsDomainEventBody        $body;

    public function __construct(
        AnalyticsDomainEventId $id,
        AnalyticsDomainEventAggregateId $aggregateId,
        AnalyticsDomainEventName $name,
        AnalyticsDomainEventBody $body
    ) {
        $this->id          = $id;
        $this->aggregateId = $aggregateId;
        $this->name        = $name;
        $this->body        = $body;
    }

    public function id(): AnalyticsDomainEventId
    {
        return $this->id;
    }

    public function aggregateId(): AnalyticsDomainEventAggregateId
    {
        return $this->aggregateId;
    }

    public function name(): AnalyticsDomainEventName
    {
        return $this->name;
    }

    public function body(): AnalyticsDomainEventBody
    {
        return $this->body;
    }
}
