<?php

declare(strict_types=1);

namespace Gtto\Apps\Mooc\Backend\Command\DomainEvents\RabbitMq;

use Gtto\Shared\Infrastructure\Bus\Event\DomainEventSubscriberLocator;
use Gtto\Shared\Infrastructure\Bus\Event\RabbitMq\RabbitMqDomainEventsConsumer;
use Gtto\Shared\Infrastructure\Doctrine\DatabaseConnections;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use function Lambdish\Phunctional\repeat;

final class ConsumeRabbitMqDomainEventsCommand extends Command
{
    protected static                     $defaultName = 'gtto:domain-events:rabbitmq:consume';
    private RabbitMqDomainEventsConsumer $consumer;
    private DatabaseConnections          $connections;
    private DomainEventSubscriberLocator $locator;

    public function __construct(
        RabbitMqDomainEventsConsumer $consumer,
        DatabaseConnections $connections,
        DomainEventSubscriberLocator $locator
    ) {
        parent::__construct();

        $this->consumer    = $consumer;
        $this->connections = $connections;
        $this->locator     = $locator;
    }

    protected function configure(): void
    {
        $this
            ->setDescription('Consume domain events from the RabbitMQ')
            ->addArgument('queue', InputArgument::REQUIRED, 'Queue name')
            ->addArgument('quantity', InputArgument::REQUIRED, 'Quantity of events to process');
    }

    protected function execute(InputInterface $input, OutputInterface $output): void
    {
        $queueName       = (string) $input->getArgument('queue');
        $eventsToProcess = (int) $input->getArgument('quantity');

        repeat($this->consumer($queueName), $eventsToProcess);
    }

    private function consumer(string $queueName): callable
    {
        return function () use ($queueName) {
            $subscriber = $this->locator->withRabbitMqQueueNamed($queueName);

            $this->consumer->consume($subscriber, $queueName);

            $this->connections->clear();
        };
    }
}
