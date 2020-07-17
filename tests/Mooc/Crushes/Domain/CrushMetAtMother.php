<?php

declare(strict_types = 1);

namespace Gtto\Tests\Mooc\Crushes\Domain;


use Gtto\Mooc\Crushes\Domain\CrushMetAt;

final class CrushMetAtMother
{
    public static function create(\DateTime $date): CrushMetAt
    {
        return new CrushMetAt($date);
    }

    public static function random(): CrushMetAt
    {
        $date = new \DateTime('now');
        return self::create($date);
    }
}
