<?php

declare(strict_types = 1);

namespace Gtto\Mooc\CrushesCounter\Application\Increment;

use Gtto\Mooc\CrushesCounter\Domain\CrushesCounter;
use Gtto\Mooc\CrushesCounter\Domain\CrushesCounterId;
use Gtto\Mooc\CrushesCounter\Domain\CrushesCounterRepository;
use Gtto\Mooc\Shared\Domain\CrushId;
use Gtto\Shared\Domain\Bus\Event\EventBus;
use Gtto\Shared\Domain\UuidGenerator;

final class CrushesCounterIncrementer
{
    private $repository;
    private $uuidGenerator;
    private $bus;

    public function __construct(
        CrushesCounterRepository $repository,
        UuidGenerator $uuidGenerator,
        EventBus $bus
    ) {
        $this->repository    = $repository;
        $this->uuidGenerator = $uuidGenerator;
        $this->bus           = $bus;
    }

    public function __invoke(CrushId $CrushId)
    {
        $counter = $this->repository->search() ?: $this->initializeCounter();

        if (!$counter->hasIncremented($CrushId)) {
            $counter->increment($CrushId);

            $this->repository->save($counter);
            $this->bus->publish(...$counter->pullDomainEvents());
        }
    }

    private function initializeCounter(): CrushesCounter
    {
        return CrushesCounter::initialize(new CrushesCounterId($this->uuidGenerator->generate()));
    }
}
