<?php

declare(strict_types=1);

namespace Gtto\Tests\Shared\Infrastructure\Mockery;

use Gtto\Tests\Shared\Infrastructure\PhpUnit\Constraint\GttoConstraintIsSimilar;
use Mockery\Matcher\MatcherAbstract;

final class GttoMatcherIsSimilar extends MatcherAbstract
{
    private GttoConstraintIsSimilar $constraint;

    public function __construct($value, $delta = 0.0)
    {
        parent::__construct($value);

        $this->constraint = new GttoConstraintIsSimilar($value, $delta);
    }

    public function match(&$actual): bool
    {
        return $this->constraint->evaluate($actual, '', true);
    }

    public function __toString(): string
    {
        return 'Is similar';
    }
}
