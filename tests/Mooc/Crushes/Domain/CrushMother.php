<?php

declare(strict_types = 1);

namespace Gtto\Tests\Mooc\Crushes\Domain;

use Gtto\Mooc\Crushes\Application\Create\CreateCrushCommand;
use Gtto\Mooc\Crushes\Domain\Crush;
use Gtto\Mooc\Crushes\Domain\CrushName;
use Gtto\Mooc\Shared\Domain\CrushId;
use Gtto\Mooc\Shared\Domain\Date;
use Gtto\Mooc\Shared\Domain\Email;
use Gtto\Mooc\Crushes\Domain\CrushAssTypesId;
use Gtto\Mooc\Crushes\Domain\CrushBodyTypesId;
use Gtto\Mooc\Crushes\Domain\CrushFacebookUrl;
use Gtto\Mooc\Crushes\Domain\CrushInstagramUrl;
use Gtto\Mooc\Crushes\Domain\CrushWhatsappUrl;
use Gtto\Mooc\Crushes\Domain\CrushDickTypesId;
use Gtto\Mooc\Crushes\Domain\CrushEyeTypesId;
use Gtto\Mooc\Crushes\Domain\CrushHairTypesId;
use Gtto\Mooc\Crushes\Domain\CrushHeightTypesId;
use Gtto\Mooc\Crushes\Domain\CrushSkinTypesId;
use Gtto\Mooc\Crushes\Domain\CrushTitsTypesId;
use Gtto\Mooc\Shared\Domain\Age;
use Gtto\Mooc\Shared\Domain\CountryId;
use Gtto\Mooc\Shared\Domain\GenderId;
use Gtto\Mooc\Shared\Domain\UserId;
use Gtto\Mooc\Shared\Domain\ZoneId;
use Gtto\Tests\Mooc\Shared\Domain\CountryIdMother;
use Gtto\Tests\Mooc\Shared\Domain\DateMother;
use Gtto\Tests\Mooc\Shared\Domain\GenderIdMother;
use Gtto\Tests\Mooc\Shared\Domain\AgeMother;
use Gtto\Tests\Mooc\Shared\Domain\EmailMother;
use Gtto\Tests\Mooc\Crushes\Domain\CrushIdMother;
use Gtto\Tests\Mooc\Crushes\Domain\CrushNameMother;
use Gtto\Tests\Mooc\Shared\Domain\UserIdMother;
use Gtto\Tests\Mooc\Shared\Domain\ZoneIdMother;

final class CrushMother
{
    public static function create(CrushId $id, CrushName $name, Age $age, GenderId $genderId, Date $metAt, ZoneId $zoneId,
                                  CountryId $countryId, UserId $userId, Email $email, CrushWhatsappUrl $crushWhatsapp,
                                  CrushInstagramUrl $crushInstagram, CrushFacebookUrl $crushFacebook, bool $isStar, Date $createdAt, CrushEyeTypesId $eyeTypesId,
                                  CrushHairTypesId $hairTypesId, CrushHeightTypesId $heightTypesId, CrushBodyTypesId $bodyTypesId,
                                  CrushSkinTypesId $skinTypesId, CrushTitsTypesId $titsTypesId, CrushAssTypesId $assTypesId, CrushDickTypesId $dickTypesId): Crush
    {
        return new crush($id, $name, $age, $genderId, $metAt, $zoneId, $countryId, $userId, $email,
            $crushWhatsapp, $crushInstagram, $crushFacebook, $isStar, $createdAt, $eyeTypesId, $hairTypesId, $heightTypesId,
            $bodyTypesId, $skinTypesId, $titsTypesId, $assTypesId, $dickTypesId);
    }

    public static function fromRequest(CreateCrushCommand $request): crush
    {
        return self::create(
            CrushIdMother::create($request->id()),
            CrushNameMother::create($request->name()),
            AgeMother::create($request->age()),
            GenderIdMother::create($request->genderId()),
            DateMother::create(new \DateTime($request->metAt())),
            ZoneIdMother::create($request->zoneId()),
            CountryIdMother::create($request->countryId()),
            UserIdMother::create($request->userId()),
            EmailMother::create($request->email()),
            CrushWhatsappUrlMother::create($request->whatsapp()),
            CrushInstagramUrlMother::create($request->instagram()),
            CrushFacebookUrlMother::create($request->facebook()),
            false,
            DateMother::create(new \DateTime($request->createdAt())),
            CrushEyeTypesIdMother::create($request->eyeTypesId()),
            CrushHairTypesIdMother::create($request->hairTypesId()),
            CrushHeightTypesIdMother::create($request->heightTypesId()),
            CrushBodyTypesIdMother::create($request->bodyTypesId()),
            CrushSkinTypesIdMother::create($request->skinTypesId()),
            CrushTitsTypesIdMother::create($request->titsTypesId()),
            CrushAssTypesIdMother::create($request->assTypesId()),
            CrushDickTypesIdMother::create($request->dickTypesId())
            );
    }

    public static function random(): crush
    {
        return self::create(CrushIdMother::random(), CrushNameMother::random(), AgeMother::random(),
            GenderIdMother::random(), DateMother::random(), ZoneIdMother::random(), CountryIdMother::random(), UserIdMother::random(),
            EmailMother::random(), CrushWhatsappUrlMother::random(), CrushInstagramUrlMother::random(), CrushFacebookUrlMother::random(),
            false, DateMother::random(), CrushEyeTypesIdMother::random(), CrushHairTypesIdMother::random(), CrushHeightTypesIdMother::random(),
            CrushBodyTypesIdMother::random(), CrushSkinTypesIdMother::random(), CrushTitsTypesIdMother::random(), CrushAssTypesIdMother::random(),
            CrushDickTypesIdMother::random()
            );
    }
}
