<?php

declare(strict_types=1);

namespace Gtto\Backoffice\Crushes\Application\Create;

use Gtto\Backoffice\Crushes\Domain\BackofficeCrush;
use Gtto\Backoffice\Crushes\Domain\BackofficeCrushRepository;

final class BackofficeCrushCreator
{
    private BackofficeCrushRepository $repository;

    public function __construct(BackofficeCrushRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(string $id, string $name): void
    {
        $this->repository->save(new BackofficeCrush($id, $name));
    }
}
