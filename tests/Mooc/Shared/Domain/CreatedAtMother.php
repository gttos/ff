<?php

declare(strict_types = 1);

namespace Gtto\Tests\Mooc\Shared\Domain;


use Gtto\Mooc\Shared\Domain\CreatedAt;

final class CreatedAtMother
{
    public static function create(\DateTime $date): CreatedAt
    {
        return new CreatedAt($date);
    }

    public static function random(): CreatedAt
    {
        $date = new \DateTime('now');
        return self::create($date);
    }
}
