<?php

declare(strict_types = 1);

namespace Gtto\Mooc\Crushes\Application\Create;

use Gtto\Mooc\Crushes\Domain\CrushAssTypesId;
use Gtto\Mooc\Crushes\Domain\CrushBodyTypesId;
use Gtto\Mooc\Crushes\Domain\CrushFacebookUrl;
use Gtto\Mooc\Crushes\Domain\CrushInstagramUrl;
use Gtto\Mooc\Crushes\Domain\CrushMetAt;
use Gtto\Mooc\Crushes\Domain\CrushName;
use Gtto\Mooc\Crushes\Domain\CrushWhatsappUrl;
use Gtto\Mooc\Crushes\Domain\CrushDickTypesId;
use Gtto\Mooc\Crushes\Domain\CrushEyesTypesId;
use Gtto\Mooc\Crushes\Domain\CrushHairTypesId;
use Gtto\Mooc\Crushes\Domain\CrushHeightTypesId;
use Gtto\Mooc\Crushes\Domain\CrushSkinTypesId;
use Gtto\Mooc\Crushes\Domain\CrushTitsTypesId;
use Gtto\Mooc\Crushes\Domain\CrushZoneId;
use Gtto\Mooc\Shared\Domain\Age;
use Gtto\Mooc\Shared\Domain\CountryId;
use Gtto\Mooc\Shared\Domain\CreatedAt;
use Gtto\Mooc\Shared\Domain\CrushId;
use Gtto\Mooc\Shared\Domain\Email;
use Gtto\Mooc\Shared\Domain\GenderId;
use Gtto\Mooc\Shared\Domain\UserId;
use Gtto\Shared\Domain\Bus\Command\CommandHandler;

final class CreateCrushCommandHandler implements CommandHandler
{
    private $creator;

    public function __construct(CrushCreator $creator)
    {
        $this->creator = $creator;
    }

    public function __invoke(CreateCrushCommand $command)
    {
        $id             = new CrushId($command->id());
        $name           = new CrushName($command->name());
        $age            = new Age($command->age());
        $genderId       = new GenderId($command->genderId());
        $metAt          = new CrushMetAt(new \DateTime($command->metAt()));
        $zoneId         = new CrushZoneId($command->zoneId());
        $countryId      = new CountryId($command->countryId());
        $email          = new Email($command->email());
        $whatsappUrl    = new CrushWhatsappUrl($command->whatsappUrl());
        $instagramUrl   = new CrushInstagramUrl($command->instagramUrl());
        $facebookUrl    = new CrushFacebookUrl($command->facebookUrl());
        $isStar         = boolval($command->isStar());
        $createdAt      = new CreatedAt(new \DateTime($command->createdAt()));
        $userId         = new UserId($command->userId());
        $eyesTypesId     = new CrushEyesTypesId($command->eyesTypesId());
        $hairTypesId    = new CrushHairTypesId($command->hairTypesId());
        $heightTypesId  = new CrushHeightTypesId($command->heightTypesId());
        $bodyTypesId    = new CrushBodyTypesId($command->bodyTypesId());
        $skinTypesId    = new CrushSkinTypesId($command->skinTypesId());
        $titsTypesId    = new CrushTitsTypesId($command->titsTypesId());
        $assTypesId     = new CrushAssTypesId($command->assTypesId());
        $dickTypesId    = new CrushDickTypesId($command->dickTypesId());

        $this->creator->__invoke($id, $name, $age, $genderId, $metAt, $zoneId, $countryId, $userId, $createdAt, $email,
            $whatsappUrl, $instagramUrl, $facebookUrl, $isStar, $eyesTypesId, $hairTypesId, $heightTypesId,
            $bodyTypesId, $skinTypesId, $titsTypesId, $assTypesId, $dickTypesId);
    }
}
