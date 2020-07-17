<?php

declare(strict_types = 1);

namespace Gtto\Tests\Mooc\Moments\Domain;

use Gtto\Mooc\Moments\Domain\MomentStory;
use Gtto\Tests\Shared\Domain\WordMother;

final class MomentStoryMother
{
    public static function create(string $value): MomentStory
    {
        return new MomentStory($value);
    }

    public static function random(): MomentStory
    {
        return self::create(WordMother::random());
    }
}
