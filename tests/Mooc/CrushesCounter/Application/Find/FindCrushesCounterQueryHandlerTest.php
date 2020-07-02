<?php

declare(strict_types = 1);

namespace Gtto\Tests\Mooc\CrushesCounter\Application\Find;

use Gtto\Mooc\CrushesCounter\Application\Find\CrushesCounterFinder;
use Gtto\Mooc\CrushesCounter\Application\Find\FindCrushesCounterQuery;
use Gtto\Mooc\CrushesCounter\Application\Find\FindCrushesCounterQueryHandler;
use Gtto\Mooc\CrushesCounter\Domain\CrushesCounterNotExist;
use Gtto\Tests\Mooc\CrushesCounter\CrushesCounterModuleUnitTestCase;
use Gtto\Tests\Mooc\CrushesCounter\Domain\CrushesCounterMother;

final class FindCrushesCounterQueryHandlerTest extends CrushesCounterModuleUnitTestCase
{
    private $handler;

    protected function setUp(): void
    {
        parent::setUp();

        $this->handler = new FindCrushesCounterQueryHandler(new CrushesCounterFinder($this->repository()));
    }

    /** @test */
    public function it_should_find_an_existing_crushes_counter(): void
    {
        $counter  = CrushesCounterMother::random();
        $query    = new FindCrushesCounterQuery();
        $response = CrushesCounterResponseMother::create($counter->total());

        $this->shouldSearch($counter);

        $this->assertAskResponse($response, $query, $this->handler);
    }

    /** @test */
    public function it_should_throw_an_exception_when_crushes_counter_does_not_exists(): void
    {
        $query = new FindCrushesCounterQuery();

        $this->shouldSearch(null);

        $this->assertAskThrowsException(CrushesCounterNotExist::class, $query, $this->handler);
    }
}
