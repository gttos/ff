<?php

declare(strict_types=1);

namespace Gtto\Backoffice\Crushes\Domain;

use Gtto\Shared\Domain\Criteria\Criteria;

interface BackofficeCrushRepository
{
    public function save(BackofficeCrush $crush): void;

    public function searchAll(): array;

    public function matching(Criteria $criteria): array;
}
