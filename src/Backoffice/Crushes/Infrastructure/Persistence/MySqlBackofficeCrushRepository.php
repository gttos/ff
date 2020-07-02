<?php

declare(strict_types=1);

namespace Gtto\Backoffice\Crushes\Infrastructure\Persistence;

use Gtto\Backoffice\Crushes\Domain\BackofficeCrush;
use Gtto\Backoffice\Crushes\Domain\BackofficeCrushRepository;
use Gtto\Shared\Domain\Criteria\Criteria;
use Gtto\Shared\Infrastructure\Persistence\Doctrine\DoctrineCriteriaConverter;
use Gtto\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;

final class MySqlBackofficeCrushRepository extends DoctrineRepository implements BackofficeCrushRepository
{
    public function save(BackofficeCrush $crush): void
    {
        $this->persist($crush);
    }

    public function searchAll(): array
    {
        return $this->repository(BackofficeCrush::class)->findAll();
    }

    public function matching(Criteria $criteria): array
    {
        $doctrineCriteria = DoctrineCriteriaConverter::convert($criteria);

        return $this->repository(BackofficeCrush::class)->matching($doctrineCriteria)->toArray();
    }
}
