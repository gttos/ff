<?php

declare(strict_types = 1);

namespace Gtto\Tests\Mooc\Moments\Domain;

use Gtto\Mooc\Moments\Domain\Moment;
use Gtto\Mooc\Moments\Domain\MomentCreatedDomainEvent;
use Gtto\Mooc\Moments\Domain\MomentDate;
use Gtto\Mooc\Moments\Domain\MomentPlaceId;
use Gtto\Mooc\Moments\Domain\MomentRate;
use Gtto\Mooc\Moments\Domain\MomentStory;
use Gtto\Mooc\Shared\Domain\CreatedAt;
use Gtto\Mooc\Shared\Domain\CrushId;
use Gtto\Mooc\Shared\Domain\MomentId;
use Gtto\Mooc\Shared\Domain\UserId;
use Gtto\Tests\Mooc\Shared\Domain\CreatedAtMother;
use Gtto\Tests\Mooc\Shared\Domain\CrushIdMother;
use Gtto\Tests\Mooc\Shared\Domain\EmailMother;
use Gtto\Tests\Mooc\Shared\Domain\UserIdMother;

final class MomentCreatedDomainEventMother
{
    public static function create(MomentId $id, MomentPlaceId $placeId, MomentStory $story, MomentRate $rate, MomentDate $date , CrushId $crushId, UserId $userId, CreatedAt $createdAt): MomentCreatedDomainEvent
    {
        return new MomentCreatedDomainEvent($id->value(), $placeId->value(), $story->value());
    }

    public static function fromMoment(Moment $moments): MomentCreatedDomainEvent
    {
        return self::create($moments->id(), $moments->placeId(), $moments->story(), $moments->rate(), $moments->date(), $moments->crushId(), $moments->userId(), $moments->createdAt());
    }

    public static function random(): MomentCreatedDomainEvent
    {
        return self::create(MomentIdMother::random(), MomentPlaceIdMother::random(), MomentStoryMother::random(), MomentRateMother::random(), MomentDateMother::random(), CrushIdMother::random(), UserIdMother::random(), CreatedAtMother::random());
    }
}
