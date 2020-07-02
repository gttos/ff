<?php

declare(strict_types = 1);

namespace Gtto\Tests\Mooc\Crushes;

use Gtto\Mooc\Crushes\Domain\CrushRepository;
use Gtto\Tests\Mooc\Shared\Infrastructure\PhpUnit\MoocContextInfrastructureTestCase;

abstract class CrushesModuleInfrastructureTestCase extends MoocContextInfrastructureTestCase
{
    protected function repository(): CrushRepository
    {
        return $this->service(CrushRepository::class);
    }
}
