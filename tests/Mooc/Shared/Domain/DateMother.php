<?php

declare(strict_types = 1);

namespace Gtto\Tests\Mooc\Shared\Domain;


use Gtto\Mooc\Shared\Domain\Date;

final class DateMother
{
    public static function create(\DateTime $date): Date
    {
        return new Date($date);
    }

    public static function random(): Date
    {
        $date = new \DateTime('now');
        return self::create($date);
    }
}
