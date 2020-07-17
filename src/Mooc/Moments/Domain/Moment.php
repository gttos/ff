<?php

declare(strict_types = 1);

namespace Gtto\Mooc\Moments\Domain;

use Gtto\Mooc\Shared\Domain\CreatedAt;
use Gtto\Mooc\Shared\Domain\CrushId;
use Gtto\Mooc\Shared\Domain\MomentId;
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
    private $created_at;

    public function __construct(MomentId $id, MomentPlaceId $placeId, MomentStory $story, MomentRate $rate, MomentDate $date , CrushId $crushId, UserId $userId, CreatedAt $createdAt)
    {
        $this->id           = $id;
        $this->date         = $date;
        $this->rate         = $rate;
        $this->story        = $story;
        $this->place_id     = $placeId;
        $this->crush_id     = $crushId;
        $this->user_id      = $userId;
        $this->created_at   = $createdAt;
    }

    public static function create(MomentId $id, MomentPlaceId $placeId, MomentStory $story, MomentRate $rate, MomentDate $date , CrushId $crushId, UserId $userId, CreatedAt $createdAt): self
    {
        $moment = new self($id, $placeId, $story, $rate, $date, $crushId, $userId, $createdAt);

        //$moment->record(new CrushCreatedDomainEvent($id->value(), $name->value(), $email->value()));

        return $moment;
    }

    /**
     * @return MomentId
     */
    public function id(): MomentId
    {
        return $this->id;
    }

    /**
     * @return MomentPlaceId
     */
    public function placeId(): MomentPlaceId
    {
        return $this->place_id;
    }

    /**
     * @return MomentStory
     */
    public function story(): MomentStory
    {
        return $this->story;
    }

    /**
     * @return MomentRate
     */
    public function rate(): MomentRate
    {
        return $this->rate;
    }

    /**
     * @return MomentDate
     */
    public function date(): MomentDate
    {
        return $this->date;
    }

    /**
     * @return CrushId
     */
    public function crushId(): CrushId
    {
        return $this->crush_id;
    }

    /**
     * @return UserId
     */
    public function userId(): UserId
    {
        return $this->user_id;
    }

    /**
     * @return CreatedAt
     */
    public function createdAt(): CreatedAt
    {
        return $this->created_at;
    }

}
