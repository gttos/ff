<?php

declare(strict_types = 1);

namespace Gtto\Tests\Mooc\Moments\Infrastructure\Persistence;

use Doctrine\ORM\EntityManager;
use Gtto\Mooc\Moments\Domain\MomentRepository;
use Gtto\Mooc\Moments\Infrastructure\Persistence\DoctrineMomentRepository;
use Gtto\Tests\Mooc\Moments\Domain\MomentMother;
use Gtto\Tests\Mooc\Moments\MomentsModuleInfrastructureTestCase;
use Gtto\Tests\Mooc\Moments\Domain\MomentIdMother;

final class DoctrineMomentRepositoryTest extends MomentsModuleInfrastructureTestCase
{
    /** @test */
    public function it_should_save_a_moment(): void
    {
        $moment = MomentMother::random();

        $this->doctrineRepository()->save($moment);
        $this->clearUnitOfWork();
    }

    /** @test */
    public function it_should_return_an_existing_moment(): void
    {
        $moment = MomentMother::random();

        $this->doctrineRepository()->save($moment);
        $this->clearUnitOfWork();

        $this->assertEquals($moment, $this->doctrineRepository()->search($moment->id()));
    }

    /** @test */
    public function it_should_not_return_a_non_existing_moment(): void
    {
        $this->assertNull($this->doctrineRepository()->search(MomentIdMother::random()));
    }

    private function doctrineRepository(): MomentRepository
    {
        return new DoctrineMomentRepository($this->service(EntityManager::class));
    }
}
