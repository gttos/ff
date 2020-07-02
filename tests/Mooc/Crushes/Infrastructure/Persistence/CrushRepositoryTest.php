<?php

declare(strict_types = 1);

namespace Gtto\Tests\Mooc\Crushes\Infrastructure\Persistence;

use Gtto\Tests\Mooc\Crushes\CrushesModuleInfrastructureTestCase;
use Gtto\Tests\Mooc\Crushes\Domain\CrushIdMother;
use Gtto\Tests\Mooc\Crushes\Domain\CrushMother;

final class CrushRepositoryTest extends crushesModuleInfrastructureTestCase
{
    /** @test */
    public function it_should_save_a_crush(): void
    {
        $crush = CrushMother::random();

        $this->repository()->save($crush);
    }

    /** @test */
    public function it_should_return_an_existing_crush(): void
    {
        $crush = CrushMother::random();

        $this->repository()->save($crush);

        $this->assertEquals($crush, $this->repository()->search($crush->id()));
    }

    /** @test */
    public function it_should_not_return_a_non_existing_crush(): void
    {
        $this->assertNull($this->repository()->search(CrushIdMother::random()));
    }
}
