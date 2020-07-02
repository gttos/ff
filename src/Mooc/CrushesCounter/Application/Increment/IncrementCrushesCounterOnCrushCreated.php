<?php

declare(strict_types = 1);

namespace Gtto\Mooc\CrushesCounter\Application\Increment;

use Gtto\Mooc\Crushes\Domain\CrushCreatedDomainEvent;
use Gtto\Mooc\Shared\Domain\CrushId;
use Gtto\Shared\Domain\Bus\Event\DomainEventSubscriber;
use function Lambdish\Phunctional\apply;

final class IncrementCrushesCounterOnCrushCreated implements DomainEventSubscriber
{
    private $incrementer;

    public function __construct(CrushesCounterIncrementer $incrementer)
    {
        $this->incrementer = $incrementer;
    }

    public static function subscribedTo(): array
    {
        return [CrushCreatedDomainEvent::class];
    }

    public function __invoke(CrushCreatedDomainEvent $event): void
    {
        $CrushId = new CrushId($event->aggregateId());

        apply($this->incrementer, [$CrushId]);
    }
}
