<?php

declare(strict_types=1);

namespace Gtto\Shared\Infrastructure\Persistence\Elasticsearch;

use Gtto\Shared\Domain\Criteria\Filter;
use Gtto\Shared\Domain\Criteria\FilterOperator;
use function Lambdish\Phunctional\get;

final class ElasticQueryGenerator
{
    private const MUST_TYPE     = 'must';
    private const MUST_NOT_TYPE = 'must_not';
    private const TERM_TERM     = 'term';
    private const TERM_RANGE    = 'range';
    private const TERM_WILDCARD = 'wildcard';
    private static array $termMapping   = [
        FilterOperator::EQUAL        => self::TERM_TERM,
        FilterOperator::NOT_EQUAL    => '!=',
        FilterOperator::GT           => self::TERM_RANGE,
        FilterOperator::LT           => self::TERM_RANGE,
        FilterOperator::CONTAINS     => self::TERM_WILDCARD,
        FilterOperator::NOT_CONTAINS => self::TERM_WILDCARD,
    ];
    private static array $mustNotFields = [FilterOperator::NOT_EQUAL, FilterOperator::NOT_CONTAINS];

    public function __invoke(array $query, Filter $filter): array
    {
        $type          = $this->typeFor($filter->operator());
        $termLevel     = $this->termLevelFor($filter->operator());
        $valueTemplate = $filter->operator()->isContaining() ? '*%s*' : '%s';

        return array_merge_recursive(
            $query,
            [
                $type => [
                    $termLevel => [
                        $filter->field()->value() => sprintf(
                            $valueTemplate,
                            strtolower($filter->value()->value())
                        ),
                    ],
                ],
            ]
        );
    }

    private function typeFor(FilterOperator $operator): string
    {
        return in_array($operator->value(), self::$mustNotFields, true) ? self::MUST_NOT_TYPE : self::MUST_TYPE;
    }

    private function termLevelFor(FilterOperator $operator): string
    {
        return get($operator->value(), self::$termMapping);
    }
}
