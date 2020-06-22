<?php

declare(strict_types=1);

namespace Gtto\Mooc\Courses\Application\Create;

use Gtto\Mooc\Courses\Domain\Course;
use Gtto\Mooc\Courses\Domain\CourseDuration;
use Gtto\Mooc\Courses\Domain\CourseName;
use Gtto\Mooc\Courses\Domain\CourseRepository;
use Gtto\Mooc\Shared\Domain\Course\CourseId;
use Gtto\Shared\Domain\Bus\Event\EventBus;

final class CourseCreator
{
    private CourseRepository $repository;
    private EventBus         $bus;

    public function __construct(CourseRepository $repository, EventBus $bus)
    {
        $this->repository = $repository;
        $this->bus        = $bus;
    }

    public function __invoke(CourseId $id, CourseName $name, CourseDuration $duration): void
    {
        $course = Course::create($id, $name, $duration);

        $this->repository->save($course);
        $this->bus->publish(...$course->pullDomainEvents());
    }
}
