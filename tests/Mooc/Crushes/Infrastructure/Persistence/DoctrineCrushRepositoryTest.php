<?php

declare(strict_types = 1);

namespace Gtto\Tests\Mooc\Crushes\Infrastructure\Persistence;

use Doctrine\ORM\EntityManager;
use Gtto\Mooc\Crushes\Domain\CrushRepository;
use Gtto\Mooc\Crushes\Infrastructure\Persistence\DoctrineCrushRepository;
use Gtto\Tests\Mooc\Crushes\CrushesModuleInfrastructureTestCase;
use Gtto\Tests\Mooc\Crushes\Domain\CrushMother;
use Gtto\Tests\Mooc\Shared\Domain\CrushIdMother;

final class DoctrineCrushRepositoryTest extends CrushesModuleInfrastructureTestCase
{
    /** @test */
    public function it_should_save_a_crush(): void
    {
        $crush = CrushMother::random();

        $this->doctrineRepository()->save($crush);
        $this->clearUnitOfWork();
    }

    /** @test */
    public function it_should_return_an_existing_crush(): void
    {
        $crush = CrushMother::random();

        $this->doctrineRepository()->save($crush);
        $this->clearUnitOfWork();

        $this->assertEquals($crush, $this->doctrineRepository()->search($crush->id()));
    }

    /** @test */
    public function it_should_not_return_a_non_existing_crush(): void
    {
        $this->assertNull($this->doctrineRepository()->search(CrushIdMother::random()));
    }

    private function doctrineRepository(): CrushRepository
    {
        return new DoctrineCrushRepository($this->service(EntityManager::class));
    }
}
