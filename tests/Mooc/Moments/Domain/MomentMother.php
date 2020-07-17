<?php

declare(strict_types = 1);

namespace Gtto\Tests\Mooc\Moments\Domain;

use Gtto\Mooc\Moments\Application\Create\CreateMomentCommand;
use Gtto\Mooc\Moments\Domain\Moment;
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
use Gtto\Tests\Mooc\Shared\Domain\UserIdMother;

final class MomentMother
{
    public static function create(MomentId $id, MomentPlaceId $placeId, MomentStory $story, MomentRate $rate, MomentDate $date , CrushId $crushId, UserId $userId, CreatedAt $createdAt): Moment
    {
        return new Moment($id, $placeId, $story, $rate, $date, $crushId, $userId, $createdAt);
    }

    public static function fromRequest(CreateMomentCommand $request): moment
    {
        return self::create(
            MomentIdMother::create($request->id()),
            MomentPlaceIdMother::create($request->placeId()),
            MomentStoryMother::create($request->story()),
            MomentRateMother::create($request->rate()),
            MomentDateMother::create(new \DateTime($request->date())),
            CrushIdMother::create($request->crushId()),
            UserIdMother::create($request->userId()),
            CreatedAtMother::create(new \DateTime($request->createdAt()))
        );
    }

    public static function random(): moment
    {
        return self::create(MomentIdMother::random(), MomentPlaceIdMother::random(), MomentStoryMother::random(),
            MomentRateMother::random(), MomentDateMother::random(), CrushIdMother::random(), UserIdMother::random(), CreatedAtMother::random(),);
    }
}
