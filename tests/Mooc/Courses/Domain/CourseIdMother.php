<?php

declare(strict_types=1);

namespace Gtto\Tests\Mooc\Courses\Domain;

use Gtto\Mooc\Shared\Domain\Course\CourseId;
use Gtto\Tests\Shared\Domain\UuidMother;

final class CourseIdMother
{
    public static function create(string $value): CourseId
    {
        return new CourseId($value);
    }

    public static function creator(): callable
    {
        return static fn() => self::random();
    }

    public static function random(): CourseId
    {
        return self::create(UuidMother::random());
    }
}
