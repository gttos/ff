<?php

declare(strict_types = 1);

namespace Gtto\Mooc\Crushes\Domain;

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
use Gtto\Mooc\Shared\Domain\CreatedAt;
use Gtto\Mooc\Shared\Domain\Email;
use Gtto\Mooc\Shared\Domain\GenderId;
use Gtto\Mooc\Shared\Domain\CountryId;
use Gtto\Mooc\Shared\Domain\CrushId;
use Gtto\Mooc\Shared\Domain\UpdatedAt;
use Gtto\Mooc\Shared\Domain\UserId;
use Gtto\Shared\Domain\Aggregate\AggregateRoot;

final class Crush extends AggregateRoot
{
    private $id;
    private $name;
    private $age;
    private $gender_id;
    private $email;
    private $whatsapp_url;
    private $instagram_url;
    private $facebook_url;
    private $is_active;
    private $is_star;
    private $met_at;
    private $created_at;
    private $updated_at;
    private $user_id;
    private $country_id;
    private $zone_id;
    private $eyes_types_id;
    private $hair_types_id;
    private $height_types_id;
    private $body_types_id;
    private $skin_types_id;
    private $tits_types_id;
    private $ass_types_id;
    private $dick_types_id;

    public function __construct(
        CrushId $id,
        CrushName $name,
        Age $age,
        GenderId $genderId,
        CrushMetAt $metAt,
        CrushZoneId $zoneId,
        CountryId $countryId,
        UserId $userId,
        Email $email,
        CrushWhatsappUrl $whatsappUrl,
        CrushInstagramUrl $instagramUrl,
        CrushFacebookUrl $facebookUrl,
        bool $isStar,
        CreatedAt $createdAt,
        CrushEyesTypesId $eyesTypesId,
        CrushHairTypesId $hairTypesId,
        CrushHeightTypesId $heightTypesId,
        CrushBodyTypesId $bodyTypesId,
        CrushSkinTypesId $skinTypesId,
        CrushTitsTypesId $titsTypesId,
        CrushAssTypesId $assTypesId,
        CrushDickTypesId $dickTypesId
    ){
        $this->id               = $id;
        $this->name             = $name;
        $this->age              = $age;
        $this->met_at           = $metAt;
        $this->gender_id        = $genderId;
        $this->zone_id          = $zoneId;
        $this->user_id          = $userId;
        $this->is_star          = $isStar;
        $this->is_active        = true;
        $this->country_id       = $countryId;
        $this->whatsapp_url     = $whatsappUrl;
        $this->email            = $email;
        $this->instagram_url    = $instagramUrl;
        $this->facebook_url     = $facebookUrl;
        $this->eyes_types_id    = $eyesTypesId;
        $this->hair_types_id    = $hairTypesId;
        $this->height_types_id  = $heightTypesId;
        $this->body_types_id    = $bodyTypesId;
        $this->skin_types_id    = $skinTypesId;
        $this->tits_types_id    = $titsTypesId;
        $this->ass_types_id     = $assTypesId;
        $this->dick_types_id    = $dickTypesId;
        $this->created_at       = $createdAt;
    }

    public static function create(CrushId $id, CrushName $name, Age $age, GenderId $genderId, CrushMetAt $metAt,
                                  CrushZoneId $zoneId, CountryId $countryId, UserId $userId, Email $email,
                                  CrushWhatsappUrl $wathsappUrl, CrushInstagramUrl $instagramUrl, CrushFacebookUrl $facebookUrl,
                                  bool $isStar, CreatedAt $createdAt, CrushEyesTypesId $eyesTypesId, CrushHairTypesId $hairTypesId, CrushHeightTypesId $heightTypesId,
                                  CrushBodyTypesId $bodyTypesId, CrushSkinTypesId $skinTypesId, CrushTitsTypesId $titsTypesId,
                                  CrushAssTypesId $assTypesId, CrushDickTypesId $dickTypesId
    ): self
    {
        $crush = new self($id, $name, $age, $genderId, $metAt, $zoneId, $countryId, $userId, $email, $wathsappUrl,
            $instagramUrl, $facebookUrl, $isStar, $createdAt, $eyesTypesId, $hairTypesId, $heightTypesId,
            $bodyTypesId, $skinTypesId, $titsTypesId, $assTypesId, $dickTypesId
        );
        $crush->record(new CrushCreatedDomainEvent($id->value(), $name->value()));

        return $crush;
    }

    /**
     * @return CrushId
     */
    public function id(): CrushId
    {
        return $this->id;
    }

    /**
     * @return CrushName
     */
    public function name(): CrushName
    {
        return $this->name;
    }

    /**
     * @param $newName
     * @return CrushName
     */
    public function rename($newName): CrushName
    {
        return $this->name = $newName;
    }

    /**
     * @return Age
     */
    public function age(): Age
    {
        return $this->age;
    }

    /**
     * @return GenderId
     */
    public function genderId(): GenderId
    {
        return $this->gender_id;
    }

    /**
     * @return Email
     */
    public function email(): Email
    {
        return $this->email;
    }

    /**
     * @return CrushWhatsappUrl
     */
    public function whatsappUrl(): CrushWhatsappUrl
    {
        return $this->whatsapp_url;
    }

    /**
     * @return CrushInstagramUrl
     */
    public function instagramUrl(): CrushInstagramUrl
    {
        return $this->instagram_url;
    }

    /**
     * @return CrushFacebookUrl
     */
    public function facebookUrl(): CrushFacebookUrl
    {
        return $this->facebook_url;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->is_active;
    }

    /**
     * @return bool
     */
    public function isStar(): bool
    {
        return $this->is_star;
    }

    /**
     * @return CrushMetAt
     */
    public function metAt(): CrushMetAt
    {
        return $this->met_at;
    }

    /**
     * @return CreatedAt
     */
    public function createdAt(): CreatedAt
    {
        return $this->created_at;
    }

    /**
     * @return UpdatedAt
     */
    public function updatedAt(): UpdatedAt
    {
        return $this->updated_at;
    }

    /**
     * @return UserId
     */
    public function userId(): UserId
    {
        return $this->user_id;
    }

    /**
     * @return CountryId
     */
    public function countryId(): CountryId
    {
        return $this->country_id;
    }

    /**
     * @return ZoneId
     */
    public function zoneId(): ZoneId
    {
        return $this->zone_id;
    }

    /**
     * @return CrushEyesTypesId
     */
    public function eyesTypesId(): CrushEyesTypesId
    {
        return $this->eye_types_id;
    }

    /**
     * @return CrushHairTypesId
     */
    public function hairTypesId(): CrushHairTypesId
    {
        return $this->hair_types_id;
    }

    /**
     * @return CrushHeightTypesId
     */
    public function heightTypesId(): CrushHeightTypesId
    {
        return $this->height_types_id;
    }

    /**
     * @return CrushBodyTypesId
     */
    public function bodyTypesId(): CrushBodyTypesId
    {
        return $this->body_types_id;
    }

    /**
     * @return CrushSkinTypesId
     */
    public function skinTypesId(): CrushSkinTypesId
    {
        return $this->skin_types_id;
    }

    /**
     * @return CrushTitsTypesId
     */
    public function titsTypesId(): CrushTitsTypesId
    {
        return $this->tits_types_id;
    }

    /**
     * @return CrushAssTypesId
     */
    public function assTypesId(): CrushAssTypesId
    {
        return $this->ass_types_id;
    }

    /**
     * @return CrushDickTypesId
     */
    public function dickTypesId(): CrushDickTypesId
    {
        return $this->dick_types_id;
    }
}
