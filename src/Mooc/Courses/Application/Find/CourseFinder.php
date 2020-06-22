<?php

declare(strict_types=1);

namespace Gtto\Mooc\Courses\Application\Find;

use Gtto\Mooc\Courses\Domain\Course;
use Gtto\Mooc\Courses\Domain\CourseNotExist;
use Gtto\Mooc\Courses\Domain\CourseRepository;
use Gtto\Mooc\Shared\Domain\Course\CourseId;

final class CourseFinder
{
    private CourseRepository $repository;

    public function __construct(CourseRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(CourseId $id): Course
    {
        $course = $this->repository->search($id);

        if (null === $course) {
            throw new CourseNotExist($id);
        }

        return $course;
    }
}
