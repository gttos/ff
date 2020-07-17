<?php

declare(strict_types = 1);

namespace Gtto\Mooc\Moments\Domain;

use Gtto\Mooc\Shared\Domain\MomentId;

interface MomentRepository
{
    public function save(Moment $crush): void;

    public function search(MomentId $id): ?Moment;
}
