<?php

declare(strict_types=1);

namespace Gtto\Backoffice\Courses\Application\SearchAll;

use Gtto\Backoffice\Courses\Application\BackofficeCourseResponse;
use Gtto\Backoffice\Courses\Application\BackofficeCoursesResponse;
use Gtto\Backoffice\Courses\Domain\BackofficeCourse;
use Gtto\Backoffice\Courses\Domain\BackofficeCourseRepository;
use function Lambdish\Phunctional\map;

final class AllBackofficeCoursesSearcher
{
    private BackofficeCourseRepository $repository;

    public function __construct(BackofficeCourseRepository $repository)
    {
        $this->repository = $repository;
    }

    public function searchAll(): BackofficeCoursesResponse
    {
        return new BackofficeCoursesResponse(...map($this->toResponse(), $this->repository->searchAll()));
    }

    private function toResponse(): callable
    {
        return static fn(BackofficeCourse $course) => new BackofficeCourseResponse(
            $course->id(),
            $course->name(),
            $course->duration()
        );
    }
}
