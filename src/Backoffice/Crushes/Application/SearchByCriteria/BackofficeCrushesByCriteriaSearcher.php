<?php

declare(strict_types=1);

namespace Gtto\Backoffice\Crushes\Application\SearchByCriteria;

use Gtto\Backoffice\Crushes\Application\BackofficeCrushResponse;
use Gtto\Backoffice\Crushes\Application\BackofficeCrushesResponse;
use Gtto\Backoffice\Crushes\Domain\BackofficeCrush;
use Gtto\Backoffice\Crushes\Domain\BackofficeCrushRepository;
use Gtto\Shared\Domain\Criteria\Criteria;
use Gtto\Shared\Domain\Criteria\Filters;
use Gtto\Shared\Domain\Criteria\Order;
use function Lambdish\Phunctional\map;

final class BackofficeCrushesByCriteriaSearcher
{
    private BackofficeCrushRepository $repository;

    public function __construct(BackofficeCrushRepository $repository)
    {
        $this->repository = $repository;
    }

    public function search(Filters $filters, Order $order, ?int $limit, ?int $offset): BackofficeCrushesResponse
    {
        $criteria = new Criteria($filters, $order, $offset, $limit);

        return new BackofficeCrushesResponse(...map($this->toResponse(), $this->repository->matching($criteria)));
    }

    private function toResponse(): callable
    {
        return static fn(BackofficeCrush $crush) => new BackofficeCrushResponse(
            $crush->id(),
            $crush->name()
        );
    }
}
