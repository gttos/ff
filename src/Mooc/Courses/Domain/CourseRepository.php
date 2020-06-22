<?php

declare(strict_types=1);

namespace Gtto\Mooc\Courses\Domain;

use Gtto\Mooc\Shared\Domain\Course\CourseId;

interface CourseRepository
{
    public function save(Course $course): void;

    public function search(CourseId $id): ?Course;
}
