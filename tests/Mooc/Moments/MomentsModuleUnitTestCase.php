<?php

declare(strict_types = 1);

namespace Gtto\Tests\Mooc\Moments;

use Gtto\Mooc\Moments\Domain\Moment;
use Gtto\Mooc\Moments\Domain\MomentRepository;
use Gtto\Mooc\Shared\Domain\MomentId;
use Gtto\Tests\Shared\Infrastructure\PhpUnit\UnitTestCase;
use Mockery\MockInterface;

abstract class MomentsModuleUnitTestCase extends UnitTestCase
{
    private $repository;

    protected function shouldSave(Moment $moment): void
    {
        $this->repository()
            ->shouldReceive('save')
            ->with($this->similarTo($moment))
            ->once()
            ->andReturnNull();
    }

    protected function shouldSearch(MomentId $id, ?Moment $moment): void
    {
        $this->repository()
            ->shouldReceive('search')
            ->with($this->similarTo($id))
            ->once()
            ->andReturn($moment);
    }

    /** @return MomentRepository|MockInterface */
    protected function repository(): MockInterface
    {
        return $this->repository = $this->repository ?: $this->mock(MomentRepository::class);
    }
}
