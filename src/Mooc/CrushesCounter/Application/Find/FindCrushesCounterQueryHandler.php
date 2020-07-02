<?php

declare(strict_types = 1);

namespace Gtto\Mooc\CrushesCounter\Application\Find;

use Gtto\Shared\Domain\Bus\Query\QueryHandler;

final class FindCrushesCounterQueryHandler implements QueryHandler
{
    private $finder;

    public function __construct(CrushesCounterFinder $finder)
    {
        $this->finder = $finder;
    }

    public function __invoke(FindCrushesCounterQuery $query): CrushesCounterResponse
    {
        return $this->finder->__invoke();
    }
}
