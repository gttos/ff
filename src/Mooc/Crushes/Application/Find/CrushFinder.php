<?php

declare(strict_types = 1);

namespace Gtto\Mooc\Crushes\Application\Find;

use Gtto\Mooc\Crushes\Domain\Crush;
use Gtto\Mooc\Crushes\Domain\CrushNotExist;
use Gtto\Mooc\Crushes\Domain\CrushRepository;
use Gtto\Mooc\Shared\Domain\CrushId;

final class CrushFinder
{
    private $repository;

    public function __construct(CrushRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(CrushId $id): crush
    {
        $crush = $this->repository->search($id);

        if (null === $crush) {
            throw new crushNotExist($id);
        }

        return $crush;
    }
}
