<?php

declare(strict_types=1);

namespace Gtto\Tests\Shared\Domain;

use Gtto\Tests\Shared\Infrastructure\Mockery\GttoMatcherIsSimilar;
use Gtto\Tests\Shared\Infrastructure\PhpUnit\Constraint\GttoConstraintIsSimilar;

final class TestUtils
{
    public static function isSimilar($expected, $actual): bool
    {
        $constraint = new GttoConstraintIsSimilar($expected);

        return $constraint->evaluate($actual, '', true);
    }

    public static function assertSimilar($expected, $actual): void
    {
        $constraint = new GttoConstraintIsSimilar($expected);

        $constraint->evaluate($actual);
    }

    public static function similarTo($value, $delta = 0.0): GttoMatcherIsSimilar
    {
        return new GttoMatcherIsSimilar($value, $delta);
    }
}
