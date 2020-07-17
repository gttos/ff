<?php

declare(strict_types = 1);

namespace Gtto\Tests\Backoffice\Crushes;

use Gtto\Backoffice\Crushes\Infrastructure\Persistence\MySqlBackofficeCrushRepository;
use Gtto\Tests\Mooc\Shared\Infrastructure\PhpUnit\MoocContextInfrastructureTestCase;
use Doctrine\ORM\EntityManager;

abstract class BackofficeCrushesModuleInfrastructureTestCase extends MoocContextInfrastructureTestCase
{
    protected function repository(): MySqlBackofficeCrushRepository
    {
        return new MySqlBackofficeCrushRepository($this->service(EntityManager::class));
    }
}
