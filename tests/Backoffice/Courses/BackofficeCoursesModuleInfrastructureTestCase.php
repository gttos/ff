<?php

declare(strict_types=1);

namespace Gtto\Tests\Backoffice\Courses;

use Gtto\Backoffice\Courses\Infrastructure\Persistence\MySqlBackofficeCourseRepository;
use Gtto\Tests\Mooc\Shared\Infrastructure\PhpUnit\MoocContextInfrastructureTestCase;
use Doctrine\ORM\EntityManager;

abstract class BackofficeCoursesModuleInfrastructureTestCase extends MoocContextInfrastructureTestCase
{
    protected function repository(): MySqlBackofficeCourseRepository
    {
        return new MySqlBackofficeCourseRepository($this->service(EntityManager::class));
    }
}
