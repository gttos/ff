<?php

declare(strict_types=1);

namespace Gtto\Tests\Shared\Infrastructure\PhpUnit;

use Gtto\Tests\Mooc\Shared\Infrastructure\PhpUnit\MoocEnvironmentArranger;
use Gtto\Tests\Shared\Domain\TestUtils;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

abstract class InfrastructureTestCase extends KernelTestCase
{
    protected function setUp(): void
    {
        self::bootKernel(['environment' => 'test']);

        parent::setUp();

        // @todo This should be for the "Shared Infrastructure" connection
        $arranger = new MoocEnvironmentArranger($this->service(EntityManager::class));

        $arranger->arrange();
    }

    protected function assertSimilar($expected, $actual): void
    {
        TestUtils::assertSimilar($expected, $actual);
    }

    /** @return mixed */
    protected function service($id)
    {
        return self::$container->get($id);
    }

    /** @return mixed */
    protected function parameter($parameter)
    {
        return self::$container->getParameter($parameter);
    }
}
