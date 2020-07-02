<?php

declare(strict_types = 1);

namespace Gtto\Mooc\CrushesCounter\Domain;

interface CrushesCounterRepository
{
    public function save(CrushesCounter $counter): void;

    public function search(): ?CrushesCounter;
}
