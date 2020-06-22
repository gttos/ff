<?php

declare(strict_types=1);

namespace Gtto\Backoffice\Courses\Application\Create;

use Gtto\Mooc\Courses\Domain\CourseCreatedDomainEvent;
use Gtto\Shared\Domain\Bus\Event\DomainEventSubscriber;

final class CreateBackofficeCourseOnCourseCreated implements DomainEventSubscriber
{
    private BackofficeCourseCreator $creator;

    public function __construct(BackofficeCourseCreator $creator)
    {
        $this->creator = $creator;
    }

    public static function subscribedTo(): array
    {
        return [CourseCreatedDomainEvent::class];
    }

    public function __invoke(CourseCreatedDomainEvent $event): void
    {
        $this->creator->create($event->aggregateId(), $event->name(), $event->duration());
    }
}
