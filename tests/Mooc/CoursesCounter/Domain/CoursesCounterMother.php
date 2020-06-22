<?php

declare(strict_types=1);

namespace Gtto\Tests\Mooc\CoursesCounter\Domain;

use Gtto\Mooc\CoursesCounter\Domain\CoursesCounter;
use Gtto\Mooc\CoursesCounter\Domain\CoursesCounterId;
use Gtto\Mooc\CoursesCounter\Domain\CoursesCounterTotal;
use Gtto\Mooc\Shared\Domain\Course\CourseId;
use Gtto\Tests\Mooc\Courses\Domain\CourseIdMother;
use Gtto\Tests\Shared\Domain\Repeater;

final class CoursesCounterMother
{
    public static function create(
        CoursesCounterId $id,
        CoursesCounterTotal $total,
        CourseId ...$existingCourses
    ): CoursesCounter {
        return new CoursesCounter($id, $total, ...$existingCourses);
    }

    public static function withOne(CourseId $courseId): CoursesCounter
    {
        return self::create(CoursesCounterIdMother::random(), CoursesCounterTotalMother::one(), $courseId);
    }

    public static function incrementing(CoursesCounter $existingCounter, CourseId $courseId): CoursesCounter
    {
        return self::create(
            $existingCounter->id(),
            CoursesCounterTotalMother::create($existingCounter->total()->value() + 1),
            ...array_merge($existingCounter->existingCourses(), [$courseId])
        );
    }

    public static function random(): CoursesCounter
    {
        return self::create(
            CoursesCounterIdMother::random(),
            CoursesCounterTotalMother::random(),
            ...Repeater::random(CourseIdMother::creator())
        );
    }
}
