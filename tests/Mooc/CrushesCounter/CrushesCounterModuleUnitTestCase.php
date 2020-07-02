<?php

declare(strict_types = 1);

namespace Gtto\Tests\Mooc\CrushesCounter;

use Gtto\Mooc\CrushesCounter\Domain\CrushesCounter;
use Gtto\Mooc\CrushesCounter\Domain\CrushesCounterRepository;
use Gtto\Tests\Shared\Infrastructure\PhpUnit\UnitTestCase;
use Mockery\MockInterface;

abstract class CrushesCounterModuleUnitTestCase extends UnitTestCase
{
    private $repository;

    protected function shouldSave(CrushesCounter $crush): void
    {
        $this->repository()
            ->shouldReceive('save')
            ->once()
            ->with($this->similarTo($crush))
            ->andReturnNull();
    }

    protected function shouldSearch(?CrushesCounter $counter): void
    {
        $this->repository()
            ->shouldReceive('search')
            ->once()
            ->andReturn($counter);
    }

    /** @return CrushesCounterRepository|MockInterface */
    protected function repository(): MockInterface
    {
        return $this->repository = $this->repository ?: $this->mock(CrushesCounterRepository::class);
    }
}
