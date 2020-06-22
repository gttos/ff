<?php

declare(strict_types=1);

namespace Gtto\Tests\Shared\Domain\Criteria;

use Gtto\Shared\Domain\Criteria\Filter;
use Gtto\Shared\Domain\Criteria\FilterField;
use Gtto\Shared\Domain\Criteria\FilterOperator;
use Gtto\Shared\Domain\Criteria\FilterValue;

final class FilterMother
{
    public static function create(FilterField $field, FilterOperator $operator, FilterValue $value): Filter
    {
        return new Filter($field, $operator, $value);
    }

    public static function fromValues($values): Filter
    {
        return Filter::fromValues($values);
    }

    public static function random(): Filter
    {
        return self::create(FilterFieldMother::random(), FilterOperator::random(), FilterValueMother::random());
    }
}
