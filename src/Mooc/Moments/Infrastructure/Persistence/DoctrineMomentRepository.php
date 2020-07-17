<?php

declare(strict_types = 1);

namespace Gtto\Mooc\Moments\Infrastructure\Persistence;

use Gtto\Mooc\Moments\Domain\Moment;
use Gtto\Mooc\Moments\Domain\MomentRepository;
use Gtto\Mooc\Shared\Domain\MomentId;
use Gtto\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;

final class DoctrineMomentRepository extends DoctrineRepository implements MomentRepository
{
    public function save(Moment $moment): void
    {
        $this->persist($moment);
    }

    public function search(MomentId $id): ?Moment
    {
        return $this->repository(Moment::class)->find($id);
    }
}
