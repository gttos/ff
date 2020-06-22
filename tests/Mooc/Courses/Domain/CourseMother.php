<?php

declare(strict_types=1);

namespace Gtto\Tests\Mooc\Courses\Domain;

use Gtto\Mooc\Courses\Application\Create\CreateCourseCommand;
use Gtto\Mooc\Courses\Domain\Course;
use Gtto\Mooc\Courses\Domain\CourseDuration;
use Gtto\Mooc\Courses\Domain\CourseName;
use Gtto\Mooc\Shared\Domain\Course\CourseId;

final class CourseMother
{
    public static function create(CourseId $id, CourseName $name, CourseDuration $duration): Course
    {
        return new Course($id, $name, $duration);
    }

    public static function fromRequest(CreateCourseCommand $request): Course
    {
        return self::create(
            CourseIdMother::create($request->id()),
            CourseNameMother::create($request->name()),
            CourseDurationMother::create($request->duration())
        );
    }

    public static function random(): Course
    {
        return self::create(CourseIdMother::random(), CourseNameMother::random(), CourseDurationMother::random());
    }
}
