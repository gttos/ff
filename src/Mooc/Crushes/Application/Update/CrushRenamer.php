<?php

declare(strict_types = 1);

namespace Gtto\Mooc\Crushes\Application\Update;

use Gtto\Mooc\Crushes\Application\Find\CrushFinder;
use Gtto\Mooc\Crushes\Domain\CrushName;
use Gtto\Mooc\Crushes\Domain\CrushRepository;
use Gtto\Mooc\Shared\Domain\CrushId;
use Gtto\Shared\Domain\Bus\Event\EventBus;

final class CrushRenamer
{
    private $repository;
    private $finder;
    private $bus;

    public function __construct(CrushRepository $repository, EventBus $bus)
    {
        $this->repository = $repository;
        $this->finder     = new CrushFinder($repository);
        $this->bus        = $bus;
    }

    public function __invoke(CrushId $id, CrushName $newName): void
    {
        $crush = $this->finder->__invoke($id);

        $crush->rename($newName);

        $this->repository->save($crush);
        $this->bus->publish(...$crush->pullDomainEvents());
    }
}
