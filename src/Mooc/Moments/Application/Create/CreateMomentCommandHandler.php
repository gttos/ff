<?php

declare(strict_types = 1);

namespace Gtto\Mooc\Moments\Application\Create;

use Gtto\Mooc\Moments\Domain\MomentDate;
use Gtto\Mooc\Moments\Domain\MomentPlaceId;
use Gtto\Mooc\Moments\Domain\MomentRate;
use Gtto\Mooc\Moments\Domain\MomentStory;
use Gtto\Mooc\Shared\Domain\CreatedAt;
use Gtto\Mooc\Shared\Domain\CrushId;
use Gtto\Mooc\Shared\Domain\MomentId;
use Gtto\Mooc\Shared\Domain\UserId;
use Gtto\Shared\Domain\Bus\Command\CommandHandler;

final class CreateMomentCommandHandler implements CommandHandler
{
    private $creator;

    public function __construct(MomentCreator $creator)
    {
        $this->creator = $creator;
    }

    public function __invoke(CreateMomentCommand $command)
    {
        $id             = new MomentId($command->id());
        $placeId        = new MomentPlaceId($command->placeId());
        $story          = new MomentStory($command->story());
        $rate           = new MomentRate($command->rate());
        $date           = new MomentDate(new \DateTime($command->date()));
        $crushId        = new CrushId($command->crushId());
        $userId         = new UserId($command->userId());
        $createdAt      = new CreatedAt(new \DateTime($command->createdAt()));

        $this->creator->__invoke($id, $placeId, $story, $rate, $date, $crushId, $userId, $createdAt);
    }
}
