<?php

declare(strict_types = 1);

namespace Gtto\Tests\Mooc\Shared\Domain;


use Gtto\Mooc\Shared\Domain\UpdatedAt;

final class UpdatedAtAtMother
{
    public static function create(\DateTime $date): UpdatedAt
    {
        return new UpdatedAt($date);
    }

    public static function random(): UpdatedAt
    {
        $date = new \DateTime('now');
        return self::create($date);
    }
}
