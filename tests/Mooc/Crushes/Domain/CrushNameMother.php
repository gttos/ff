<?php

declare(strict_types = 1);

namespace Gtto\Tests\Mooc\Crushes\Domain;

use Gtto\Mooc\Crushes\Domain\CrushName;
use Gtto\Tests\Shared\Domain\WordMother;

final class CrushNameMother
{
    public static function create(string $value): CrushName
    {
        return new CrushName($value);
    }

    public static function random(): CrushName
    {
        return self::create(WordMother::random());
    }
}
