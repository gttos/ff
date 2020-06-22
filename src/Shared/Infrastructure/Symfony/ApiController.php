<?php

declare(strict_types=1);

namespace Gtto\Shared\Infrastructure\Symfony;

use Gtto\Shared\Domain\Bus\Command\Command;
use Gtto\Shared\Domain\Bus\Command\CommandBus;
use Gtto\Shared\Domain\Bus\Query\Query;
use Gtto\Shared\Domain\Bus\Query\QueryBus;
use Gtto\Shared\Domain\Bus\Query\Response;
use function Lambdish\Phunctional\each;

abstract class ApiController
{
    private QueryBus                           $queryBus;
    private CommandBus                         $commandBus;

    public function __construct(
        QueryBus $queryBus,
        CommandBus $commandBus,
        ApiExceptionsHttpStatusCodeMapping $exceptionHandler
    ) {
        $this->queryBus   = $queryBus;
        $this->commandBus = $commandBus;

        each(
            fn(int $httpCode, string $exceptionClass) => $exceptionHandler->register($exceptionClass, $httpCode),
            $this->exceptions()
        );
    }

    abstract protected function exceptions(): array;

    protected function ask(Query $query): ?Response
    {
        return $this->queryBus->ask($query);
    }

    protected function dispatch(Command $command): void
    {
        $this->commandBus->dispatch($command);
    }
}
