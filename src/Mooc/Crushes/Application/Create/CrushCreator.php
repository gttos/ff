<?php

declare(strict_types = 1);

namespace Gtto\Mooc\Crushes\Application\Create;

use Gtto\Mooc\Crushes\Domain\CrushAssTypesId;
use Gtto\Mooc\Crushes\Domain\CrushBodyTypesId;
use Gtto\Mooc\Crushes\Domain\Crush;
use Gtto\Mooc\Crushes\Domain\CrushName;
use Gtto\Mooc\Crushes\Domain\CrushRepository;
use Gtto\Mooc\Crushes\Domain\CrushInstagramUrl;
use Gtto\Mooc\Crushes\Domain\CrushFacebookUrl;
use Gtto\Mooc\Crushes\Domain\CrushWhatsappUrl;
use Gtto\Mooc\Crushes\Domain\CrushDickTypesId;
use Gtto\Mooc\Crushes\Domain\CrushEyeTypesId;
use Gtto\Mooc\Crushes\Domain\CrushHairTypesId;
use Gtto\Mooc\Crushes\Domain\CrushHeightTypesId;
use Gtto\Mooc\Crushes\Domain\CrushSkinTypesId;
use Gtto\Mooc\Crushes\Domain\CrushTitsTypesId;
use Gtto\Mooc\Shared\Domain\CrushId;
use Gtto\Mooc\Shared\Domain\Age;
use Gtto\Mooc\Shared\Domain\CountryId;
use Gtto\Mooc\Shared\Domain\Date;
use Gtto\Mooc\Shared\Domain\Email;
use Gtto\Mooc\Shared\Domain\GenderId;
use Gtto\Mooc\Shared\Domain\UserId;
use Gtto\Mooc\Shared\Domain\ZoneId;
use Gtto\Shared\Domain\Bus\Event\EventBus;

final class CrushCreator
{
    private $repository;
    private $bus;

    public function __construct(CrushRepository $repository, EventBus $bus)
    {
        $this->repository = $repository;
        $this->bus        = $bus;
    }

    public function __invoke(
        CrushId $id, CrushName $name, Age $age, GenderId $genderId, Date $metAt, ZoneId $zoneId,
        CountryId $countryId, UserId $userId, Date $createdAt, Email $email, CrushWhatsappUrl $whatsapp,
        CrushInstagramUrl $instagram, CrushFacebookUrl $facebook, bool $isStar, CrushEyeTypesId $eyeTypesId,
        CrushHairTypesId $hairTypesId, CrushHeightTypesId $heightTypesId, CrushBodyTypesId $bodyTypesId, CrushSkinTypesId $skinTypesId,
        CrushTitsTypesId $titsTypesId, CrushAssTypesId $assTypesId, CrushDickTypesId $dickTypesId
    ){
        $crush = crush::create($id, $name, $age, $genderId, $metAt, $zoneId, $countryId, $userId, $email, $whatsapp,
            $instagram, $facebook, $isStar, $createdAt, $eyeTypesId, $hairTypesId, $heightTypesId,
            $bodyTypesId, $skinTypesId, $titsTypesId, $assTypesId, $dickTypesId
        );

        $this->repository->save($crush);
        $this->bus->publish(...$crush->pullDomainEvents());
    }
}
