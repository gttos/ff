<?php

declare(strict_types = 1);

namespace Gtto\Mooc\Crushes\Domain;

use Carbon\Carbon;
use Gtto\Mooc\Shared\Domain\Age;
use Gtto\Mooc\Shared\Domain\AssTypesId;
use Gtto\Mooc\Shared\Domain\BodyTypesId;
use Gtto\Mooc\Shared\Domain\CountryId;
use Gtto\Mooc\Shared\Domain\FacebookUrl;
use Gtto\Mooc\Shared\Domain\CrushId;
use Gtto\Mooc\Shared\Domain\InstagramUrl;
use Gtto\Mooc\Shared\Domain\WhatsappUrl;
use Gtto\Mooc\Shared\Domain\DickTypesId;
use Gtto\Mooc\Shared\Domain\Email;
use Gtto\Mooc\Shared\Domain\EyeTypesId;
use Gtto\Mooc\Shared\Domain\GenderId;
use Gtto\Mooc\Shared\Domain\HairTypesId;
use Gtto\Mooc\Shared\Domain\HeightTypesId;
use Gtto\Mooc\Shared\Domain\SkinTypesId;
use Gtto\Mooc\Shared\Domain\TitTypesId;
use Gtto\Mooc\Shared\Domain\UserId;
use Gtto\Mooc\Shared\Domain\UserSessionId;
use Gtto\Mooc\Shared\Domain\ZoneId;
use Gtto\Shared\Domain\Aggregate\AggregateRoot;
use Symfony\Component\Validator\Constraints\Date;

final class UserSession extends AggregateRoot
{
    private $id;
    private $token;
    private $refresh_token;
    private $expires_in;
    private $last_login;


    public function __construct(UserSessionId $id, CrushName $name, Age $age, GenderId $genderId, \DateTime $metAt, ZoneId $zoneId, CountryId $countryId, UserId $userId)
    {
        $this->id               = $id;
        $this->name             = $name;
        $this->age              = $age;
        $this->met_at           = $metAt;
        $this->gender           = $genderId;
        $this->zone_id          = $zoneId;
        $this->user_id          = $userId;
        $this->country_id       = $countryId;
        $this->created_at       = Carbon::now('UTC');
    }

    public static function create(CrushId $id, CrushName $name, Age $age, GenderId $genderId, \DateTime $metAt, ZoneId $zoneId, CountryId $countryId, UserId $userId): self
    {
        $crush = new self($id, $name, $age, $genderId, $metAt, $zoneId, $countryId, $userId);

        $crush->record(new CrushCreatedDomainEvent($id->value(), $name->value(), $email->value()));

        return $crush;
    }

    public function id(): CrushId
    {
        return $this->id;
    }

    public function name(): CrushName
    {
        return $this->name;
    }

    public function age(): Age
    {
        return $this->age;
    }

    public function setName(CrushName $newName): void
    {
        $this->name = $newName;
    }

    public function setGender(GenderId $gender): void
    {
        $this->gender = $gender;
    }

    public function setEmail(Email $email): void
    {
        $this->email = $email;
    }

    public function setWhatsapp(WhatsappUrl $whatsapp): void
    {
        $this->whatsapp = $whatsapp;
    }

    public function setInstagram(InstagramUrl $instagram): void
    {
        $this->instagram = $instagram;
    }

    public function setFacebook(FacebookUrl $facebook): void
    {
        $this->facebook = $facebook;
    }

    public function setIsActive($is_active): void
    {
        $this->is_active = $is_active;
    }

    public function setIsStar($is_star): void
    {
        $this->is_star = $is_star;
    }

    public function setMetAt(\DateTime $met_at): void
    {
        $this->met_at = $met_at;
    }

    public function setCreatedAt(\DateTime $created_at): void
    {
        $this->created_at = $created_at;
    }

    public function setUpdatedAt($updated_at): void
    {
        $this->updated_at = $updated_at;
    }

    public function setUserId(UserId $user_id): void
    {
        $this->user_id = $user_id;
    }

    public function setCountryId(CountryId $country_id): void
    {
        $this->country_id = $country_id;
    }

    public function setZoneId(ZoneId $zone_id): void
    {
        $this->zone_id = $zone_id;
    }

    public function setEyeTypesId(EyeTypesId $eye_types_id): void
    {
        $this->eye_types_id = $eye_types_id;
    }

    public function setHairTypesId(HairTypesId $hair_types_id): void
    {
        $this->hair_types_id = $hair_types_id;
    }

    public function setHeightTypesId(HeightTypesId $height_types_id): void
    {
        $this->height_types_id = $height_types_id;
    }

    public function setBodyTypesId(BodyTypesId $body_types_id): void
    {
        $this->body_types_id = $body_types_id;
    }

    public function setSkinTypesId(SkinTypesId $skin_types_id): void
    {
        $this->skin_types_id = $skin_types_id;
    }

    public function setTitsTypesId(TitTypesId $tits_types_id): void
    {
        $this->tits_types_id = $tits_types_id;
    }

    public function setAssTypesId(AssTypesId $ass_types_id): void
    {
        $this->ass_types_id = $ass_types_id;
    }

    public function setDickTypesId(DickTypesId $dick_types_id): void
    {
        $this->dick_types_id = $dick_types_id;
    }
}
