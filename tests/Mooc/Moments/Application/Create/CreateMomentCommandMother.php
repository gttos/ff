<?php

declare(strict_types = 1);

namespace Gtto\Tests\Mooc\Moments\Application\Create;

use Gtto\Mooc\Moments\Application\Create\CreateMomentCommand;
use Gtto\Mooc\Moments\Domain\MomentDate;
use Gtto\Mooc\Moments\Domain\MomentPlaceId;
use Gtto\Mooc\Moments\Domain\MomentRate;
use Gtto\Mooc\Moments\Domain\MomentStory;
use Gtto\Mooc\Shared\Domain\CreatedAt;
use Gtto\Mooc\Shared\Domain\CrushId;
use Gtto\Mooc\Shared\Domain\MomentId;
use Gtto\Mooc\Shared\Domain\UserId;
use Gtto\Tests\Mooc\Moments\Domain\MomentDateMother;
use Gtto\Tests\Mooc\Moments\Domain\MomentRateMother;
use Gtto\Tests\Mooc\Moments\Domain\MomentStoryMother;
use Gtto\Tests\Mooc\Moments\Domain\MomentPlaceIdMother;
use Gtto\Tests\Mooc\Shared\Domain\CreatedAtMother;
use Gtto\Tests\Mooc\Moments\Domain\MomentIdMother;
use Gtto\Tests\Mooc\Shared\Domain\CrushIdMother;
use Gtto\Tests\Mooc\Shared\Domain\UserIdMother;

final class CreateMomentCommandMother
{
    public static function create(MomentId $id, MomentPlaceId $placeId, MomentStory $story, MomentRate $rate, MomentDate $date , CrushId $crushId, UserId $userId, CreatedAt $createdAt): CreateMomentCommand {
        return new CreateMomentCommand($id->value(), $placeId->value(), $story->value(), $rate->value(), $date->value(),
            $crushId->value(), $userId->value(), $createdAt->value());
    }

    public static function random(): CreateMomentCommand
    {
        return self::create(MomentIdMother::random(), MomentPlaceIdMother::random(), MomentStoryMother::random(),
            MomentRateMother::random(), MomentDateMother::random(), CrushIdMother::random(), UserIdMother::random(), CreatedAtMother::random(),);
    }
}
