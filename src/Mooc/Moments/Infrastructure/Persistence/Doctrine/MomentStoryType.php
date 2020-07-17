<?php

declare(strict_types = 1);

namespace Gtto\Mooc\Moments\Infrastructure\Persistence\Doctrine;

use Doctrine\DBAL\Types\StringType;
use Gtto\Mooc\Moments\Domain\MomentStory;

final class MomentStoryType extends StringType
{
    public static function customTypeName(): string
    {
        return 'story';
    }

    protected function typeClassName(): string
    {
        return MomentStory::class;
    }
}
