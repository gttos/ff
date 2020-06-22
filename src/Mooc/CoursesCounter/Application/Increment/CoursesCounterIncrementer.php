<?php

declare(strict_types=1);

namespace Gtto\Mooc\CoursesCounter\Application\Increment;

use Gtto\Mooc\CoursesCounter\Domain\CoursesCounter;
use Gtto\Mooc\CoursesCounter\Domain\CoursesCounterId;
use Gtto\Mooc\CoursesCounter\Domain\CoursesCounterRepository;
use Gtto\Mooc\Shared\Domain\Course\CourseId;
use Gtto\Shared\Domain\Bus\Event\EventBus;
use Gtto\Shared\Domain\UuidGenerator;

final class CoursesCounterIncrementer
{
    private CoursesCounterRepository $repository;
    private UuidGenerator            $uuidGenerator;
    private EventBus                 $bus;

    public function __construct(
        CoursesCounterRepository $repository,
        UuidGenerator $uuidGenerator,
        EventBus $bus
    ) {
        $this->repository    = $repository;
        $this->uuidGenerator = $uuidGenerator;
        $this->bus           = $bus;
    }

    public function __invoke(CourseId $courseId): void
    {
        $counter = $this->repository->search() ?: $this->initializeCounter();

        if (!$counter->hasIncremented($courseId)) {
            $counter->increment($courseId);

            $this->repository->save($counter);
            $this->bus->publish(...$counter->pullDomainEvents());
        }
    }

    private function initializeCounter(): CoursesCounter
    {
        return CoursesCounter::initialize(new CoursesCounterId($this->uuidGenerator->generate()));
    }
}
