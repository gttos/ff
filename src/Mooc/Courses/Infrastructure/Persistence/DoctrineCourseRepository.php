<?php

declare(strict_types=1);

namespace Gtto\Mooc\Courses\Infrastructure\Persistence;

use Gtto\Mooc\Courses\Domain\Course;
use Gtto\Mooc\Courses\Domain\CourseRepository;
use Gtto\Mooc\Shared\Domain\Course\CourseId;
use Gtto\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;

final class DoctrineCourseRepository extends DoctrineRepository implements CourseRepository
{
    public function save(Course $course): void
    {
        $this->persist($course);
    }

    public function search(CourseId $id): ?Course
    {
        return $this->repository(Course::class)->find($id);
    }
}
