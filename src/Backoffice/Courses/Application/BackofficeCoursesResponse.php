<?php

declare(strict_types=1);

namespace Gtto\Backoffice\Courses\Application;

use Gtto\Shared\Domain\Bus\Query\Response;

final class BackofficeCoursesResponse implements Response
{
    private array $courses;

    public function __construct(BackofficeCourseResponse ...$courses)
    {
        $this->courses = $courses;
    }

    public function courses(): array
    {
        return $this->courses;
    }
}
