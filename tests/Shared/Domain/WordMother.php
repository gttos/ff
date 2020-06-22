<?php

declare(strict_types=1);

namespace Gtto\Tests\Shared\Domain;

final class WordMother
{
    public static function random(): string
    {
        return MotherCreator::random()->word;
    }
}
