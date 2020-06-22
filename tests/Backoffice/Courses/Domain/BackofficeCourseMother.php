<?php

declare(strict_types=1);

namespace Gtto\Tests\Backoffice\Courses\Domain;

use Gtto\Backoffice\Courses\Domain\BackofficeCourse;
use Gtto\Tests\Mooc\Courses\Domain\CourseDurationMother;
use Gtto\Tests\Mooc\Courses\Domain\CourseIdMother;
use Gtto\Tests\Mooc\Courses\Domain\CourseNameMother;

final class BackofficeCourseMother
{
    public static function create(string $id, string $name, string $duration): BackofficeCourse
    {
        return new BackofficeCourse($id, $name, $duration);
    }

    public static function withName(string $name): BackofficeCourse
    {
        return self::create(
            CourseIdMother::random()->value(),
            $name,
            CourseDurationMother::random()->value()
        );
    }

    public static function random(): BackofficeCourse
    {
        return self::create(
            CourseIdMother::random()->value(),
            CourseNameMother::random()->value(),
            CourseDurationMother::random()->value()
        );
    }
}
