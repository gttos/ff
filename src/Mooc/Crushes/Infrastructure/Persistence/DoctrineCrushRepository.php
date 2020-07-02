<?php

declare(strict_types = 1);

namespace Gtto\Mooc\Crushes\Infrastructure\Persistence;

use Gtto\Mooc\Crushes\Domain\Crush;
use Gtto\Mooc\Crushes\Domain\CrushRepository;
use Gtto\Mooc\Shared\Domain\CrushId;
use Gtto\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;

final class DoctrineCrushRepository extends DoctrineRepository implements CrushRepository
{
    public function save(Crush $crush): void
    {
        $this->persist($crush);
    }

    public function search(CrushId $id): ?Crush
    {
        return $this->repository(Crush::class)->find($id);
    }
}
