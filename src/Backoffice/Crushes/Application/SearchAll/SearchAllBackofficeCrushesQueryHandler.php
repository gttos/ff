<?php

declare(strict_types=1);

namespace Gtto\Backoffice\Crushes\Application\SearchAll;

use Gtto\Backoffice\Crushes\Application\BackofficeCrushesResponse;
use Gtto\Shared\Domain\Bus\Query\QueryHandler;

final class SearchAllBackofficeCrushesQueryHandler implements QueryHandler
{
    private AllBackofficeCrushesSearcher $searcher;

    public function __construct(AllBackofficeCrushesSearcher $searcher)
    {
        $this->searcher = $searcher;
    }

    public function __invoke(SearchAllBackofficeCrushesQuery $query): BackofficeCrushesResponse
    {
        return $this->searcher->searchAll();
    }
}
