<?php

declare(strict_types=1);

namespace Gtto\Tests\Mooc\Courses\Application\Create;

use Gtto\Mooc\Courses\Application\Create\CreateCourseCommand;
use Gtto\Mooc\Courses\Domain\CourseDuration;
use Gtto\Mooc\Courses\Domain\CourseName;
use Gtto\Mooc\Shared\Domain\Course\CourseId;
use Gtto\Tests\Mooc\Courses\Domain\CourseDurationMother;
use Gtto\Tests\Mooc\Courses\Domain\CourseIdMother;
use Gtto\Tests\Mooc\Courses\Domain\CourseNameMother;

final class CreateCourseCommandMother
{
    public static function create(CourseId $id, CourseName $name, CourseDuration $duration): CreateCourseCommand
    {
        return new CreateCourseCommand($id->value(), $name->value(), $duration->value());
    }

    public static function random(): CreateCourseCommand
    {
        return self::create(CourseIdMother::random(), CourseNameMother::random(), CourseDurationMother::random());
    }
}
