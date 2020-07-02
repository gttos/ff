<?php

declare(strict_types=1);

namespace Gtto\Backoffice\Crushes\Application\Create;

use Gtto\Mooc\Crushes\Domain\CrushCreatedDomainEvent;
use Gtto\Shared\Domain\Bus\Event\DomainEventSubscriber;

final class CreateBackofficeCrushOnCrushCreated implements DomainEventSubscriber
{
    private BackofficeCrushCreator $creator;

    public function __construct(BackofficeCrushCreator $creator)
    {
        $this->creator = $creator;
    }

    public static function subscribedTo(): array
    {
        return [CrushCreatedDomainEvent::class];
    }

    public function __invoke(CrushCreatedDomainEvent $event): void
    {
        $this->creator->create($event->aggregateId(), $event->name());
    }
}
