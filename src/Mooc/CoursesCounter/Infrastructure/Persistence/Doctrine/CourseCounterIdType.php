<?php

declare(strict_types=1);

namespace Gtto\Mooc\CoursesCounter\Infrastructure\Persistence\Doctrine;

use Gtto\Mooc\CoursesCounter\Domain\CoursesCounterId;
use Gtto\Shared\Infrastructure\Persistence\Doctrine\UuidType;

final class CourseCounterIdType extends UuidType
{
    protected function typeClassName(): string
    {
        return CoursesCounterId::class;
    }
}
