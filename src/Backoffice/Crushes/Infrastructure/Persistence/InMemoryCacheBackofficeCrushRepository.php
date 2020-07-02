<?php

declare(strict_types=1);

namespace Gtto\Backoffice\Crushes\Infrastructure\Persistence;

use Gtto\Backoffice\Crushes\Domain\BackofficeCrush;
use Gtto\Backoffice\Crushes\Domain\BackofficeCrushRepository;
use Gtto\Shared\Domain\Criteria\Criteria;
use function Lambdish\Phunctional\get;

final class InMemoryCacheBackofficeCrushRepository implements BackofficeCrushRepository
{
    private static array               $allCrushesCache = [];
    private static array               $matchingCache   = [];
    private BackofficeCrushRepository $repository;

    public function __construct(BackofficeCrushRepository $repository)
    {
        $this->repository = $repository;
    }

    public function save(BackofficeCrush $crush): void
    {
        $this->repository->save($crush);
    }

    public function searchAll(): array
    {
        return empty(self::$allCrushesCache) ? $this->searchAllAndFillCache() : self::$allCrushesCache;
    }

    public function matching(Criteria $criteria): array
    {
        return get($criteria->serialize(), self::$matchingCache) ?: $this->searchMatchingAndFillCache($criteria);
    }

    private function searchAllAndFillCache(): array
    {
        return self::$allCrushesCache = $this->repository->searchAll();
    }

    private function searchMatchingAndFillCache(Criteria $criteria): array
    {
        return self::$matchingCache[$criteria->serialize()] = $this->repository->matching($criteria);
    }
}
