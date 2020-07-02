<?php

declare(strict_types=1);

namespace Gtto\Backoffice\Crushes\Infrastructure\Persistence;

use Gtto\Backoffice\Crushes\Domain\BackofficeCrush;
use Gtto\Backoffice\Crushes\Domain\BackofficeCrushRepository;
use Gtto\Shared\Domain\Criteria\Criteria;
use Gtto\Shared\Infrastructure\Persistence\Elasticsearch\ElasticsearchRepository;
use function Lambdish\Phunctional\map;

final class ElasticsearchBackofficeCrushRepository extends ElasticsearchRepository implements BackofficeCrushRepository
{
    public function save(BackofficeCrush $crush): void
    {
        $this->persist($crush->id(), $crush->toPrimitives());
    }

    public function searchAll(): array
    {
        return map($this->toCrush(), $this->searchAllInElastic());
    }

    public function matching(Criteria $criteria): array
    {
        return map($this->toCrush(), $this->searchByCriteria($criteria));
    }

    protected function aggregateName(): string
    {
        return 'crushes';
    }

    private function toCrush(): callable
    {
        return static fn(array $primitives) => BackofficeCrush::fromPrimitives($primitives);
    }
}
