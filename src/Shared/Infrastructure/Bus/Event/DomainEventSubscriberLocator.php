<?php

declare(strict_types=1);

namespace Gtto\Shared\Infrastructure\Bus\Event;

use Gtto\Shared\Domain\Bus\Event\DomainEventSubscriber;
use Gtto\Shared\Infrastructure\Bus\CallableFirstParameterExtractor;
use Gtto\Shared\Infrastructure\Bus\Event\RabbitMq\RabbitMqQueueNameFormatter;
use RuntimeException;
use Traversable;
use function Lambdish\Phunctional\search;

final class DomainEventSubscriberLocator
{
    private array $mapping;

    public function __construct(Traversable $mapping)
    {
        $this->mapping = iterator_to_array($mapping);
    }

    public function allSubscribedTo(string $eventClass): callable
    {
        $formatted = CallableFirstParameterExtractor::forPipedCallables($this->mapping);

        return $formatted[$eventClass];
    }

    public function withRabbitMqQueueNamed(string $queueName): DomainEventSubscriber
    {
        $subscriber = search(
            static fn(DomainEventSubscriber $subscriber) => RabbitMqQueueNameFormatter::format($subscriber) ===
                                                            $queueName,
            $this->mapping
        );

        if (null === $subscriber) {
            throw new RuntimeException("There are no subscribers for the <$queueName> queue");
        }

        return $subscriber;
    }

    public function all(): array
    {
        return $this->mapping;
    }
}
