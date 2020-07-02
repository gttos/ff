<?php

declare(strict_types = 1);

namespace Gtto\Tests\Backoffice\Crushes\Infrastructure\Persistence;

use Gtto\Tests\Backoffice\Crushes\BackofficeCrushesModuleInfrastructureTestCase;
use Gtto\Tests\Backoffice\Crushes\Domain\BackofficeCrushCriteriaMother;
use Gtto\Tests\Backoffice\Crushes\Domain\BackofficeCrushMother;
use Gtto\Tests\Shared\Domain\Criteria\CriteriaMother;

final class MySqlBackofficeCrushRepositoryTest extends BackofficeCrushesModuleInfrastructureTestCase
{
    /** @test */
    public function it_should_save_a_valid_crush(): void
    {
        $this->repository()->save(BackofficeCrushMother::random());
    }

    /** @test */
    public function it_should_search_all_existing_crushes(): void
    {
        $existingCrush        = BackofficeCrushMother::random();
        $anotherExistingCrush = BackofficeCrushMother::random();
        $existingCrushes       = [$existingCrush, $anotherExistingCrush];

        $this->repository()->save($existingCrush);
        $this->repository()->save($anotherExistingCrush);

        $this->assertSimilar($existingCrushes, $this->repository()->searchAll());
    }

    /** @test */
    public function it_should_search_all_existing_crushes_with_an_empty_criteria(): void
    {
        $existingCrush        = BackofficeCrushMother::random();
        $anotherExistingCrush = BackofficeCrushMother::random();
        $existingCrushes       = [$existingCrush, $anotherExistingCrush];

        $this->repository()->save($existingCrush);
        $this->repository()->save($anotherExistingCrush);
        $this->clearUnitOfWork();

        $this->assertSimilar($existingCrushes, $this->repository()->matching(CriteriaMother::empty()));
    }

    /** @test */
    public function it_should_filter_by_criteria(): void
    {
        $dddInPhpcrush  = BackofficeCrushMother::withName('DDD en PHP');
        $dddInJavacrush = BackofficeCrushMother::withName('DDD en Java');
        $intellijcrush  = BackofficeCrushMother::withName('Exprimiendo Intellij');
        $dddcrushes      = [$dddInPhpcrush, $dddInJavacrush];

        $nameContainsDddCriteria = BackofficeCrushCriteriaMother::nameContains('DDD');

        $this->repository()->save($dddInJavacrush);
        $this->repository()->save($dddInPhpcrush);
        $this->repository()->save($intellijcrush);
        $this->clearUnitOfWork();

        $this->assertSimilar($dddcrushes, $this->repository()->matching($nameContainsDddCriteria));
    }
}
