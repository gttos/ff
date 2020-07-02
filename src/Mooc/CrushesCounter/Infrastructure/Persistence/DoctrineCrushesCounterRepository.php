<?php

declare(strict_types = 1);

namespace Gtto\Mooc\CrushesCounter\Infrastructure\Persistence;

use Gtto\Mooc\CrushesCounter\Domain\CrushesCounter;
use Gtto\Mooc\CrushesCounter\Domain\CrushesCounterRepository;
use Gtto\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;

final class DoctrineCrushesCounterRepository extends DoctrineRepository implements CrushesCounterRepository
{
    public function save(CrushesCounter $counter): void
    {
        $this->persist($counter);
    }

    public function search(): ?CrushesCounter
    {
        return $this->repository(CrushesCounter::class)->findOneBy([]);
    }
}
