<?php

declare(strict_types = 1);

namespace Gtto\Mooc\Moments\Application\Create;

use Gtto\Mooc\Moments\Domain\Moment;
use Gtto\Mooc\Moments\Domain\MomentDate;
use Gtto\Mooc\Moments\Domain\MomentPlaceId;
use Gtto\Mooc\Moments\Domain\MomentRate;
use Gtto\Mooc\Moments\Domain\MomentRepository;
use Gtto\Mooc\Moments\Domain\MomentStory;
use Gtto\Mooc\Shared\Domain\CreatedAt;
use Gtto\Mooc\Shared\Domain\CrushId;
use Gtto\Mooc\Shared\Domain\MomentId;
use Gtto\Mooc\Shared\Domain\UserId;
use Gtto\Shared\Domain\Bus\Event\EventBus;

final class MomentCreator
{
    private $repository;
    private $bus;

    public function __construct(MomentRepository $repository, EventBus $bus)
    {
        $this->repository = $repository;
        $this->bus        = $bus;
    }

    public function __invoke(
        MomentId $id,
        MomentPlaceId $placeId,
        MomentStory $story,
        MomentRate $rate,
        MomentDate $date,
        CrushId $crushId,
        UserId $userId,
        CreatedAt $createdAt
    ){
        $moment = Moment::create($id, $placeId, $story, $rate, $date, $crushId, $userId, $createdAt);

        $this->repository->save($moment);
        // $this->bus->publish(...$moment->pullDomainEvents());
    }
}
