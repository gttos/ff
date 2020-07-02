<?php

declare(strict_types = 1);

namespace Gtto\Tests\Mooc\Crushes;

use Gtto\Mooc\Crushes\Domain\Crush;
use Gtto\Mooc\Crushes\Domain\CrushRepository;
use Gtto\Mooc\Shared\Domain\CrushId;
use Gtto\Tests\Shared\Infrastructure\PhpUnit\UnitTestCase;
use Mockery\MockInterface;

abstract class CrushesModuleUnitTestCase extends UnitTestCase
{
    private $repository;

    protected function shouldSave(Crush $crush): void
    {
        $this->repository()
            ->shouldReceive('save')
            ->with($this->similarTo($crush))
            ->once()
            ->andReturnNull();
    }

    protected function shouldSearch(CrushId $id, ?Crush $crush): void
    {
        $this->repository()
            ->shouldReceive('search')
            ->with($this->similarTo($id))
            ->once()
            ->andReturn($crush);
    }

    /** @return CrushRepository|MockInterface */
    protected function repository(): MockInterface
    {
        return $this->repository = $this->repository ?: $this->mock(CrushRepository::class);
    }
}
