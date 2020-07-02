<?php

declare(strict_types=1);

namespace Gtto\Backoffice\Crushes\Application\SearchByCriteria;

use Gtto\Backoffice\Crushes\Application\BackofficeCrushesResponse;
use Gtto\Shared\Domain\Bus\Query\QueryHandler;
use Gtto\Shared\Domain\Criteria\Filters;
use Gtto\Shared\Domain\Criteria\Order;

final class SearchBackofficeCrushesByCriteriaQueryHandler implements QueryHandler
{
    private BackofficeCrushesByCriteriaSearcher $searcher;

    public function __construct(BackofficeCrushesByCriteriaSearcher $searcher)
    {
        $this->searcher = $searcher;
    }

    public function __invoke(SearchBackofficeCrushesByCriteriaQuery $query): BackofficeCrushesResponse
    {
        $filters = Filters::fromValues($query->filters());
        $order   = Order::fromValues($query->orderBy(), $query->order());

        return $this->searcher->search($filters, $order, $query->limit(), $query->offset());
    }
}
