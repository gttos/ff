<?php

declare(strict_types = 1);

namespace Gtto\Mooc\Crushes\Domain;

use Gtto\Mooc\Shared\Domain\CrushId;

interface CrushRepository
{
    public function save(Crush $crush): void;

    public function search(CrushId $id): ?Crush;
}
