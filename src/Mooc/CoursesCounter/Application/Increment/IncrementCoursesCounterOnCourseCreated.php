<?php

declare(strict_types=1);

namespace Gtto\Mooc\CoursesCounter\Application\Increment;

use Gtto\Mooc\Courses\Domain\CourseCreatedDomainEvent;
use Gtto\Mooc\Shared\Domain\Course\CourseId;
use Gtto\Shared\Domain\Bus\Event\DomainEventSubscriber;
use function Lambdish\Phunctional\apply;

final class IncrementCoursesCounterOnCourseCreated implements DomainEventSubscriber
{
    private CoursesCounterIncrementer $incrementer;

    public function __construct(CoursesCounterIncrementer $incrementer)
    {
        $this->incrementer = $incrementer;
    }

    public static function subscribedTo(): array
    {
        return [CourseCreatedDomainEvent::class];
    }

    public function __invoke(CourseCreatedDomainEvent $event): void
    {
        $courseId = new CourseId($event->aggregateId());

        apply($this->incrementer, [$courseId]);
    }
}
