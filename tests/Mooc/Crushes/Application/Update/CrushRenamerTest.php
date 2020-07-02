<?php

declare(strict_types = 1);

namespace Gtto\Tests\Mooc\Crushes\Application\Update;

use Gtto\Mooc\Crushes\Application\Update\crushRenamer;
use Gtto\Mooc\Crushes\Domain\CrushNotExist;
use Gtto\Tests\Mooc\Crushes\CrushesModuleUnitTestCase;
use Gtto\Tests\Mooc\Crushes\Domain\CrushIdMother;
use Gtto\Tests\Mooc\Crushes\Domain\CrushMother;
use Gtto\Tests\Mooc\Crushes\Domain\CrushNameMother;
use Gtto\Tests\Shared\Domain\DuplicatorMother;

final class CrushRenamerTest extends crushesModuleUnitTestCase
{
    private $renamer;

    protected function setUp(): void
    {
        parent::setUp();

        $this->renamer = new crushRenamer($this->repository(), $this->eventBus());
    }

    /** @test */
    public function it_should_rename_an_existing_crush(): void
    {
        $crush        = CrushMother::random();
        $newName       = CrushNameMother::random();
        $renamedcrush = DuplicatorMother::with($crush, ['name' => $newName]);

        $this->shouldSearch($crush->id(), $crush);
        $this->shouldSave($renamedcrush);
        $this->shouldNotPublishDomainEvent();

        $this->renamer->__invoke($crush->id(), $newName);
    }

    /** @test */
    public function it_should_throw_an_exception_when_the_crush_not_exist(): void
    {
        $this->expectException(CrushNotExist::class);

        $id = CrushIdMother::random();

        $this->shouldSearch($id, null);

        $this->renamer->__invoke($id, CrushNameMother::random());
    }
}