<?php

declare(strict_types=1);

namespace Gtto\Tests\Mooc\Courses;

use Gtto\Mooc\Courses\Domain\CourseRepository;
use Gtto\Tests\Mooc\Shared\Infrastructure\PhpUnit\MoocContextInfrastructureTestCase;

abstract class CoursesModuleInfrastructureTestCase extends MoocContextInfrastructureTestCase
{
    protected function repository(): CourseRepository
    {
        return $this->service(CourseRepository::class);
    }
}
