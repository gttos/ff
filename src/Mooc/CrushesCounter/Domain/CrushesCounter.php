<?php

declare(strict_types = 1);

namespace Gtto\Mooc\CrushesCounter\Domain;

use Gtto\Mooc\Shared\Domain\CrushId;
use Gtto\Shared\Domain\Aggregate\AggregateRoot;
use function Lambdish\Phunctional\search;

final class CrushesCounter extends AggregateRoot
{
    private $total;
    private $existingCrushes;
    private $id;

    public function __construct(CrushesCounterId $id, CrushesCounterTotal $total, CrushId ...$existingCrushes)
    {
        $this->id              = $id;
        $this->total           = $total;
        $this->existingCrushes = $existingCrushes;
    }

    public static function initialize(CrushesCounterId $id): self
    {
        return new self($id, CrushesCounterTotal::initialize());
    }

    public function id(): CrushesCounterId
    {
        return $this->id;
    }

    public function total(): CrushesCounterTotal
    {
        return $this->total;
    }

    public function existingCrushes(): array
    {
        return $this->existingCrushes;
    }

    public function increment(CrushId $CrushId): void
    {
        $this->total             = $this->total->increment();
        $this->existingCrushes[] = $CrushId;

        $this->record(new CrushesCounterIncrementedDomainEvent($this->id()->value(), $this->total()->value()));
    }

    public function hasIncremented(CrushId $CrushId): bool
    {
        $existingCrush = search($this->CrushIdComparator($CrushId), $this->existingCrushes());

        return null !== $existingCrush;
    }

    private function CrushIdComparator(CrushId $CrushId): callable
    {
        return static function (CrushId $other) use ($CrushId) {
            return $CrushId->equals($other);
        };
    }
}
