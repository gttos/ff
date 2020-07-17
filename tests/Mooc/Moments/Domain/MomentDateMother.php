<?php

declare(strict_types = 1);

namespace Gtto\Tests\Mooc\Moments\Domain;


use Gtto\Mooc\Moments\Domain\MomentDate;

final class MomentDateMother
{
    public static function create(\DateTime $date): MomentDate
    {
        return new MomentDate($date);
    }

    public static function random(): MomentDate
    {
        $date = new \DateTime('now');
        return self::create($date);
    }
}
