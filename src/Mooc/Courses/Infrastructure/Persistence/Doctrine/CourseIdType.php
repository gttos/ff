<?php

declare(strict_types=1);

namespace Gtto\Mooc\Courses\Infrastructure\Persistence\Doctrine;

use Gtto\Mooc\Shared\Domain\Course\CourseId;
use Gtto\Shared\Infrastructure\Persistence\Doctrine\UuidType;

final class CourseIdType extends UuidType
{
    protected function typeClassName(): string
    {
        return CourseId::class;
    }
}
