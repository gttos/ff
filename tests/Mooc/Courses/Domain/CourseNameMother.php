<?php

declare(strict_types=1);

namespace Gtto\Tests\Mooc\Courses\Domain;

use Gtto\Mooc\Courses\Domain\CourseName;
use Gtto\Tests\Shared\Domain\WordMother;

final class CourseNameMother
{
    public static function create(string $value): CourseName
    {
        return new CourseName($value);
    }

    public static function random(): CourseName
    {
        return self::create(WordMother::random());
    }
}
