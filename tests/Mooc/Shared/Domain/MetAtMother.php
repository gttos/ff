<?php

declare(strict_types = 1);

namespace Gtto\Tests\Mooc\Shared\Domain;


use Gtto\Mooc\Shared\Domain\MetAt;

final class MetAtMother
{
    public static function create(\DateTime $date): MetAt
    {
        return new MetAt($date);
    }

    public static function random(): MetAt
    {
        $date = new \DateTime('now');
        return self::create($date);
    }
}
