<?php

declare(strict_types=1);

namespace Gtto\Tests\Mooc\CoursesCounter\Application\Find;

use Gtto\Mooc\CoursesCounter\Application\Find\CoursesCounterResponse;
use Gtto\Mooc\CoursesCounter\Domain\CoursesCounterTotal;
use Gtto\Tests\Mooc\CoursesCounter\Domain\CoursesCounterTotalMother;

final class CoursesCounterResponseMother
{
    public static function create(CoursesCounterTotal $total): CoursesCounterResponse
    {
        return new CoursesCounterResponse($total->value());
    }

    public static function random(): CoursesCounterResponse
    {
        return self::create(CoursesCounterTotalMother::random());
    }
}
