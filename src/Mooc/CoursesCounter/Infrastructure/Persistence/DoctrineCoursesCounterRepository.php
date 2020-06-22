<?php

declare(strict_types=1);

namespace Gtto\Mooc\CoursesCounter\Infrastructure\Persistence;

use Gtto\Mooc\CoursesCounter\Domain\CoursesCounter;
use Gtto\Mooc\CoursesCounter\Domain\CoursesCounterRepository;
use Gtto\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;

final class DoctrineCoursesCounterRepository extends DoctrineRepository implements CoursesCounterRepository
{
    public function save(CoursesCounter $counter): void
    {
        $this->persist($counter);
    }

    public function search(): ?CoursesCounter
    {
        return $this->repository(CoursesCounter::class)->findOneBy([]);
    }
}
