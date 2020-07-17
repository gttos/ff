<?php

declare(strict_types = 1);

namespace Gtto\Mooc\Moments\Application\Find;

use Gtto\Mooc\Moments\Domain\Moment;
use Gtto\Mooc\Moments\Domain\MomentNotExist;
use Gtto\Mooc\Moments\Domain\MomentRepository;
use Gtto\Mooc\Shared\Domain\MomentId;

final class MomentFinder
{
    private $repository;

    public function __construct(MomentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(MomentId $id): Moment
    {
        $moment = $this->repository->search($id);

        if (null === $moment) {
            throw new MomentNotExist($id);
        }

        return $moment;
    }
}
