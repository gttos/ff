<?php

declare(strict_types = 1);

namespace Gtto\Mooc\CrushesCounter\Application\Find;

use Gtto\Mooc\CrushesCounter\Domain\CrushesCounterNotExist;
use Gtto\Mooc\CrushesCounter\Domain\CrushesCounterRepository;

final class CrushesCounterFinder
{
    private $repository;

    public function __construct(CrushesCounterRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(): CrushesCounterResponse
    {
        $counter = $this->repository->search();

        if (null === $counter) {
            throw new CrushesCounterNotExist();
        }

        return new CrushesCounterResponse($counter->total()->value());
    }
}
