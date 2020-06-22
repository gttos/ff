<?php

declare(strict_types=1);

namespace Gtto\Tests\Mooc\Shared\Infrastructure\PhpUnit;

use Gtto\Tests\Shared\Infrastructure\Arranger\EnvironmentArranger;
use Gtto\Tests\Shared\Infrastructure\Doctrine\DatabaseCleaner;
use Doctrine\ORM\EntityManager;
use function Lambdish\Phunctional\apply;

final class MoocEnvironmentArranger implements EnvironmentArranger
{
    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function arrange(): void
    {
        apply(new DatabaseCleaner(), [$this->entityManager]);
    }

    public function close(): void
    {
    }
}
