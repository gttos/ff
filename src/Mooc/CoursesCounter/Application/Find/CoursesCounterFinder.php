<?php

declare(strict_types=1);

namespace Gtto\Mooc\CoursesCounter\Application\Find;

use Gtto\Mooc\CoursesCounter\Domain\CoursesCounterNotExist;
use Gtto\Mooc\CoursesCounter\Domain\CoursesCounterRepository;

final class CoursesCounterFinder
{
    private CoursesCounterRepository $repository;

    public function __construct(CoursesCounterRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(): CoursesCounterResponse
    {
        $counter = $this->repository->search();

        if (null === $counter) {
            throw new CoursesCounterNotExist();
        }

        return new CoursesCounterResponse($counter->total()->value());
    }
}
