<?php

declare(strict_types=1);

namespace Gtto\Backoffice\Courses\Application\SearchAll;

use Gtto\Backoffice\Courses\Application\BackofficeCoursesResponse;
use Gtto\Shared\Domain\Bus\Query\QueryHandler;

final class SearchAllBackofficeCoursesQueryHandler implements QueryHandler
{
    private AllBackofficeCoursesSearcher $searcher;

    public function __construct(AllBackofficeCoursesSearcher $searcher)
    {
        $this->searcher = $searcher;
    }

    public function __invoke(SearchAllBackofficeCoursesQuery $query): BackofficeCoursesResponse
    {
        return $this->searcher->searchAll();
    }
}
