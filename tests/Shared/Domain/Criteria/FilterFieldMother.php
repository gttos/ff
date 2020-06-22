<?php

declare(strict_types=1);

namespace Gtto\Tests\Shared\Domain\Criteria;

use Gtto\Shared\Domain\Criteria\FilterField;
use Gtto\Tests\Shared\Domain\WordMother;

final class FilterFieldMother
{
    public static function create($fieldName): FilterField
    {
        return new FilterField($fieldName);
    }

    public static function random(): FilterField
    {
        return self::create(WordMother::random());
    }
}
