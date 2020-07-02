<?php

declare(strict_types=1);

namespace Gtto\Tests\Shared\Infrastructure\Bus\Event\RabbitMq;

use Gtto\Mooc\Crushes\Domain\CrushCreatedDomainEvent;
use Gtto\Mooc\CrushesCounter\Domain\CrushesCounterIncrementedDomainEvent;
use Gtto\Shared\Domain\Bus\Event\DomainEventSubscriber;

final class TestAllWorksOnRabbitMqEventsPublished implements DomainEventSubscriber
{
    public static function subscribedTo(): array
    {
        return [
            CrushCreatedDomainEvent::class,
            CrushesCounterIncrementedDomainEvent::class,
        ];
    }

    /** @param CrushCreatedDomainEvent|CrushesCounterIncrementedDomainEvent $event */
    public function __invoke($event)
    {
    }
}
