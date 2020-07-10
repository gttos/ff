<?php

declare(strict_types = 1);

namespace Gtto\Tests\Mooc\Crushes\Application\Create;

use Gtto\Mooc\Crushes\Application\Create\CreateCrushCommand;
use Gtto\Mooc\Crushes\Domain\CrushAssTypesId;
use Gtto\Mooc\Crushes\Domain\CrushBodyTypesId;
use Gtto\Mooc\Crushes\Domain\CrushDickTypesId;
use Gtto\Mooc\Crushes\Domain\CrushEyesTypesId;
use Gtto\Mooc\Crushes\Domain\CrushFacebookUrl;
use Gtto\Mooc\Crushes\Domain\CrushHairTypesId;
use Gtto\Mooc\Crushes\Domain\CrushHeightTypesId;
use Gtto\Mooc\Crushes\Domain\CrushInstagramUrl;
use Gtto\Mooc\Crushes\Domain\CrushName;
use Gtto\Mooc\Crushes\Domain\CrushSkinTypesId;
use Gtto\Mooc\Crushes\Domain\CrushTitsTypesId;
use Gtto\Mooc\Crushes\Domain\CrushWhatsappUrl;
use Gtto\Mooc\Shared\Domain\Age;
use Gtto\Mooc\Shared\Domain\CountryId;
use Gtto\Mooc\Shared\Domain\CreatedAt;
use Gtto\Mooc\Shared\Domain\CrushId;
use Gtto\Mooc\Shared\Domain\Email;
use Gtto\Mooc\Shared\Domain\GenderId;
use Gtto\Mooc\Shared\Domain\MetAt;
use Gtto\Mooc\Shared\Domain\UserId;
use Gtto\Mooc\Shared\Domain\ZoneId;
use Gtto\Tests\Mooc\Crushes\Domain\CrushAssTypesIdMother;
use Gtto\Tests\Mooc\Crushes\Domain\CrushBodyTypesIdMother;
use Gtto\Tests\Mooc\Crushes\Domain\CrushDickTypesIdMother;
use Gtto\Tests\Mooc\Crushes\Domain\CrushEyesTypesIdMother;
use Gtto\Tests\Mooc\Crushes\Domain\CrushFacebookUrlMother;
use Gtto\Tests\Mooc\Crushes\Domain\CrushHairTypesIdMother;
use Gtto\Tests\Mooc\Crushes\Domain\CrushHeightTypesIdMother;
use Gtto\Tests\Mooc\Crushes\Domain\CrushInstagramUrlMother;
use Gtto\Tests\Mooc\Crushes\Domain\CrushSkinTypesIdMother;
use Gtto\Tests\Mooc\Crushes\Domain\CrushTitsTypesIdMother;
use Gtto\Tests\Mooc\Crushes\Domain\CrushWhatsappUrlMother;
use Gtto\Tests\Mooc\Shared\Domain\AgeMother;
use Gtto\Tests\Mooc\Shared\Domain\CountryIdMother;
use Gtto\Tests\Mooc\Shared\Domain\CreatedAtMother;
use Gtto\Tests\Mooc\Shared\Domain\EmailMother;
use Gtto\Tests\Mooc\Crushes\Domain\CrushIdMother;
use Gtto\Tests\Mooc\Crushes\Domain\CrushNameMother;
use Gtto\Tests\Mooc\Shared\Domain\GenderIdMother;
use Gtto\Tests\Mooc\Shared\Domain\MetAtMother;
use Gtto\Tests\Mooc\Shared\Domain\UserIdMother;
use Gtto\Tests\Mooc\Shared\Domain\ZoneIdMother;

final class CreateCrushCommandMother
{
    public static function create(CrushId $id, CrushName $name, Age $age, GenderId $genderId, MetAt $metAt, ZoneId $zoneId,
          CountryId $countryId, UserId $userId, Email $email, CrushWhatsappUrl $crushWhatsapp,
          CrushInstagramUrl $crushInstagram, CrushFacebookUrl $crushFacebook, bool $isStar, CreatedAt $createdAt, CrushEyesTypesId $eyesTypesId,
          CrushHairTypesId $hairTypesId, CrushHeightTypesId $heightTypesId, CrushBodyTypesId $bodyTypesId,
          CrushSkinTypesId $skinTypesId, CrushTitsTypesId $titsTypesId, CrushAssTypesId $assTypesId, CrushDickTypesId $dickTypesId
    ): CreateCrushCommand {
        return new CreateCrushCommand($id->value(), $name->value(), $age->value(), $genderId->value(), $email->value(),
            $crushWhatsapp->value(), $crushInstagram->value(), $crushFacebook->value(), $isStar, $metAt->value(), $createdAt->value(),
            $userId->value(), $countryId->value(), $zoneId->value(),
            $eyesTypesId->value(), $hairTypesId->value(), $heightTypesId->value(), $bodyTypesId->value(), $skinTypesId->value(),
            $titsTypesId->value(), $assTypesId->value(), $dickTypesId->value());
    }

    public static function random(): CreateCrushCommand
    {
        return self::create(CrushIdMother::random(), CrushNameMother::random(), AgeMother::random(),
            GenderIdMother::random(), MetAtMother::random(), ZoneIdMother::random(), CountryIdMother::random(), UserIdMother::random(),
            EmailMother::random(), CrushWhatsappUrlMother::random(), CrushInstagramUrlMother::random(), CrushFacebookUrlMother::random(),
            false, CreatedAtMother::random(), CrushEyesTypesIdMother::random(), CrushHairTypesIdMother::random(), CrushHeightTypesIdMother::random(),
            CrushBodyTypesIdMother::random(), CrushSkinTypesIdMother::random(), CrushTitsTypesIdMother::random(), CrushAssTypesIdMother::random(),
            CrushDickTypesIdMother::random());
    }
}
