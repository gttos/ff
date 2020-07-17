<?php

declare(strict_types=1);

namespace Gtto\Backoffice\Crushes\Application\Create;

use Gtto\Backoffice\Crushes\Domain\BackofficeCrush;
use Gtto\Backoffice\Crushes\Domain\BackofficeCrushRepository;
use Gtto\Mooc\Crushes\Domain\CrushAssTypesId;
use Gtto\Mooc\Crushes\Domain\CrushBodyTypesId;
use Gtto\Mooc\Crushes\Domain\CrushDickTypesId;
use Gtto\Mooc\Crushes\Domain\CrushEyesTypesId;
use Gtto\Mooc\Crushes\Domain\CrushFacebookUrl;
use Gtto\Mooc\Crushes\Domain\CrushHairTypesId;
use Gtto\Mooc\Crushes\Domain\CrushHeightTypesId;
use Gtto\Mooc\Crushes\Domain\CrushInstagramUrl;
use Gtto\Mooc\Crushes\Domain\CrushMetAt;
use Gtto\Mooc\Crushes\Domain\CrushName;
use Gtto\Mooc\Crushes\Domain\CrushSkinTypesId;
use Gtto\Mooc\Crushes\Domain\CrushTitsTypesId;
use Gtto\Mooc\Crushes\Domain\CrushWhatsappUrl;
use Gtto\Mooc\Crushes\Domain\CrushZoneId;
use Gtto\Mooc\Shared\Domain\Age;
use Gtto\Mooc\Shared\Domain\CountryId;
use Gtto\Mooc\Shared\Domain\CreatedAt;
use Gtto\Mooc\Shared\Domain\CrushId;
use Gtto\Mooc\Shared\Domain\Email;
use Gtto\Mooc\Shared\Domain\GenderId;
use Gtto\Mooc\Shared\Domain\UserId;

final class BackofficeCrushCreator
{
    private BackofficeCrushRepository $repository;

    public function __construct(BackofficeCrushRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(
        CrushId $id, CrushName $name, Age $age, GenderId $genderId, CrushMetAt $metAt, CrushZoneId $zoneId,
        CountryId $countryId, UserId $userId, CreatedAt $createdAt, Email $email, CrushWhatsappUrl $whatsappUrl,
        CrushInstagramUrl $instagramUrl, CrushFacebookUrl $facebookUrl, bool $isStar, CrushEyesTypesId $eyesTypesId,
        CrushHairTypesId $hairTypesId, CrushHeightTypesId $heightTypesId, CrushBodyTypesId $bodyTypesId, CrushSkinTypesId $skinTypesId,
        CrushTitsTypesId $titsTypesId, CrushAssTypesId $assTypesId, CrushDickTypesId $dickTypesId): void
    {
        $this->repository->save(new BackofficeCrush($id, $name));
    }
}
