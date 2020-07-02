<?php

declare(strict_types = 1);

namespace Gtto\Mooc\Moments\Domain;

use Carbon\Carbon;
use Gtto\Mooc\Shared\Domain\CrushId;
use Gtto\Mooc\Shared\Domain\MomentId;
use Gtto\Mooc\Shared\Domain\PlaceId;
use Gtto\Mooc\Shared\Domain\UserId;
use Gtto\Shared\Domain\Aggregate\AggregateRoot;

final class Moment extends AggregateRoot
{
    private $id;
    private $place_id;
    private $story;
    private $rate;
    private $date;
    private $crush_id;
    private $user_id;

    public function __construct(MomentId $id, PlaceId $placeId, MomentStory $story, MomentRate $rate, \DateTime $date , CrushId $crushId, UserId $userId)
    {
        $this->id           = $id;
        $this->date         = $date;
        $this->rate         = $rate;
        $this->story        = $story;
        $this->place_id     = $placeId;
        $this->crush_id     = $crushId;
        $this->user_id      = $userId;
        $this->created_at   = Carbon::now('UTC');
    }

    public static function create(MomentId $id, PlaceId $placeId, MomentStory $story, MomentRate $rate, \DateTime $date , CrushId $crushId, UserId $userId): self
    {
        $crush = new self($id, $placeId, $story, $rate, $date, $crushId, $userId);

        $crush->record(new CrushCreatedDomainEvent($id->value(), $name->value(), $email->value()));

        return $crush;
    }

}
