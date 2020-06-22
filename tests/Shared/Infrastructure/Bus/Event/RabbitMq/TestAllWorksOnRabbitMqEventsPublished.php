<?php

declare(strict_types=1);

namespace Gtto\Tests\Shared\Infrastructure\Bus\Event\RabbitMq;

use Gtto\Mooc\Courses\Domain\CourseCreatedDomainEvent;
use Gtto\Mooc\CoursesCounter\Domain\CoursesCounterIncrementedDomainEvent;
use Gtto\Shared\Domain\Bus\Event\DomainEventSubscriber;

final class TestAllWorksOnRabbitMqEventsPublished implements DomainEventSubscriber
{
    public static function subscribedTo(): array
    {
        return [
            CourseCreatedDomainEvent::class,
            CoursesCounterIncrementedDomainEvent::class,
        ];
    }

    /** @param CourseCreatedDomainEvent|CoursesCounterIncrementedDomainEvent $event */
    public function __invoke($event)
    {
    }
}
