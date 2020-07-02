<?php

declare(strict_types=1);

namespace Gtto\Backoffice\Crushes\Application\SearchAll;

use Gtto\Backoffice\Crushes\Application\BackofficeCrushResponse;
use Gtto\Backoffice\Crushes\Application\BackofficeCrushesResponse;
use Gtto\Backoffice\Crushes\Domain\BackofficeCrush;
use Gtto\Backoffice\Crushes\Domain\BackofficeCrushRepository;
use function Lambdish\Phunctional\map;

final class AllBackofficeCrushesSearcher
{
    private BackofficeCrushRepository $repository;

    public function __construct(BackofficeCrushRepository $repository)
    {
        $this->repository = $repository;
    }

    public function searchAll(): BackofficeCrushesResponse
    {
        return new BackofficeCrushesResponse(...map($this->toResponse(), $this->repository->searchAll()));
    }

    private function toResponse(): callable
    {
        return static fn(BackofficeCrush $crush) => new BackofficeCrushResponse(
            $crush->id(),
            $crush->name()
        );
    }
}
