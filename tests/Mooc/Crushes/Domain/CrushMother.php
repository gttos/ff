<?php

declare(strict_types = 1);

namespace Gtto\Tests\Mooc\Crushes\Domain;

use Gtto\Mooc\Crushes\Application\Create\CreateCrushCommand;
use Gtto\Mooc\Crushes\Domain\Crush;
use Gtto\Mooc\Crushes\Domain\CrushMetAt;
use Gtto\Mooc\Crushes\Domain\CrushName;
use Gtto\Mooc\Crushes\Domain\CrushZoneId;
use Gtto\Mooc\Shared\Domain\CreatedAt;
use Gtto\Mooc\Shared\Domain\CrushId;
use Gtto\Mooc\Shared\Domain\Email;
use Gtto\Mooc\Crushes\Domain\CrushAssTypesId;
use Gtto\Mooc\Crushes\Domain\CrushBodyTypesId;
use Gtto\Mooc\Crushes\Domain\CrushFacebookUrl;
use Gtto\Mooc\Crushes\Domain\CrushInstagramUrl;
use Gtto\Mooc\Crushes\Domain\CrushWhatsappUrl;
use Gtto\Mooc\Crushes\Domain\CrushDickTypesId;
use Gtto\Mooc\Crushes\Domain\CrushEyesTypesId;
use Gtto\Mooc\Crushes\Domain\CrushHairTypesId;
use Gtto\Mooc\Crushes\Domain\CrushHeightTypesId;
use Gtto\Mooc\Crushes\Domain\CrushSkinTypesId;
use Gtto\Mooc\Crushes\Domain\CrushTitsTypesId;
use Gtto\Mooc\Shared\Domain\Age;
use Gtto\Mooc\Shared\Domain\CountryId;
use Gtto\Mooc\Shared\Domain\GenderId;
use Gtto\Mooc\Shared\Domain\UserId;
use Gtto\Tests\Mooc\Shared\Domain\CountryIdMother;
use Gtto\Tests\Mooc\Shared\Domain\CreatedAtMother;
use Gtto\Tests\Mooc\Shared\Domain\CrushIdMother;
use Gtto\Tests\Mooc\Shared\Domain\GenderIdMother;
use Gtto\Tests\Mooc\Shared\Domain\AgeMother;
use Gtto\Tests\Mooc\Shared\Domain\EmailMother;
use Gtto\Tests\Mooc\Shared\Domain\UserIdMother;

final class CrushMother
{
    public static function create(CrushId $id, CrushName $name, Age $age, GenderId $genderId, CrushMetAt $metAt, CrushZoneId $zoneId,
                                  CountryId $countryId, UserId $userId, Email $email, CrushWhatsappUrl $wathsappUrl,
                                  CrushInstagramUrl $instagramUrl, CrushFacebookUrl $facebookUrl, bool $isStar, CreatedAt $createdAt, CrushEyesTypesId $eyesTypesId,
                                  CrushHairTypesId $hairTypesId, CrushHeightTypesId $heightTypesId, CrushBodyTypesId $bodyTypesId,
                                  CrushSkinTypesId $skinTypesId, CrushTitsTypesId $titsTypesId, CrushAssTypesId $assTypesId, CrushDickTypesId $dickTypesId): Crush
    {
        return new Crush($id, $name, $age, $genderId, $metAt, $zoneId, $countryId, $userId, $email,
            $wathsappUrl, $instagramUrl, $facebookUrl, $isStar, $createdAt, $eyesTypesId, $hairTypesId, $heightTypesId,
            $bodyTypesId, $skinTypesId, $titsTypesId, $assTypesId, $dickTypesId);
    }

    public static function fromRequest(CreateCrushCommand $request): Crush
    {
        return self::create(
            CrushIdMother::create($request->id()),
            CrushNameMother::create($request->name()),
            AgeMother::create($request->age()),
            GenderIdMother::create($request->genderId()),
            CrushMetAtMother::create(new \DateTime($request->metAt())),
            CrushZoneIdMother::create($request->zoneId()),
            CountryIdMother::create($request->countryId()),
            UserIdMother::create($request->userId()),
            EmailMother::create($request->email()),
            CrushWhatsappUrlMother::create($request->whatsappUrl()),
            CrushInstagramUrlMother::create($request->instagramUrl()),
            CrushFacebookUrlMother::create($request->facebookUrl()),
            false,
            CreatedAtMother::create(new \DateTime($request->createdAt())),
            CrushEyesTypesIdMother::create($request->eyesTypesId()),
            CrushHairTypesIdMother::create($request->hairTypesId()),
            CrushHeightTypesIdMother::create($request->heightTypesId()),
            CrushBodyTypesIdMother::create($request->bodyTypesId()),
            CrushSkinTypesIdMother::create($request->skinTypesId()),
            CrushTitsTypesIdMother::create($request->titsTypesId()),
            CrushAssTypesIdMother::create($request->assTypesId()),
            CrushDickTypesIdMother::create($request->dickTypesId())
            );
    }

    public static function random(): Crush
    {
        return self::create(CrushIdMother::random(), CrushNameMother::random(), AgeMother::random(),
            GenderIdMother::random(), CrushMetAtMother::random(), CrushZoneIdMother::random(), CountryIdMother::random(), UserIdMother::random(),
            EmailMother::random(), CrushWhatsappUrlMother::random(), CrushInstagramUrlMother::random(), CrushFacebookUrlMother::random(),
            false, CreatedAtMother::random(), CrushEyesTypesIdMother::random(), CrushHairTypesIdMother::random(), CrushHeightTypesIdMother::random(),
            CrushBodyTypesIdMother::random(), CrushSkinTypesIdMother::random(), CrushTitsTypesIdMother::random(), CrushAssTypesIdMother::random(),
            CrushDickTypesIdMother::random()
            );
    }
}
