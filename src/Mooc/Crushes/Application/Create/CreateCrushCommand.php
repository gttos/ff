<?php

declare(strict_types = 1);

namespace Gtto\Mooc\Crushes\Application\Create;

use Gtto\Shared\Domain\Bus\Command\Command;

final class CreateCrushCommand implements Command
{
    private $id;
    private $name;
    private $age;
    private $gender_id;
    private $email;
    private $whatsapp_url;
    private $instagram_url;
    private $facebook_url;
    private $is_star;
    private $met_at;
    private $created_at;
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
        string $id, string $name, int $age, string $genderId, string $email, string $whatsappUrl, string $instagramUrl,
        string $facebookUrl, bool $isStar, string $metAt, string $createdAt, string $userId, string $countryId, string $zoneId,
        string $eyesTypesId, string $hairTypesId, string $heightTypesId, string $bodyTypesId, string $skinTypesId,
        string $titsTypesId, string $assTypesId, string $dickTypesId
    ){
        $this->id               = $id;
        $this->name             = $name;
        $this->age              = $age;
        $this->gender_id        = $genderId;
        $this->email            = $email;
        $this->whatsapp_url     = $whatsappUrl;
        $this->instagram_url    = $instagramUrl;
        $this->facebook_url     = $facebookUrl;
        $this->is_star          = $isStar;
        $this->met_at           = $metAt;
        $this->created_at       = $createdAt;
        $this->user_id          = $userId;
        $this->country_id       = $countryId;
        $this->zone_id          = $zoneId;
        $this->eyes_types_id     = $eyesTypesId;
        $this->hair_types_id    = $hairTypesId;
        $this->height_types_id  = $heightTypesId;
        $this->body_types_id    = $bodyTypesId;
        $this->skin_types_id    = $skinTypesId;
        $this->tits_types_id    = $titsTypesId;
        $this->ass_types_id     = $assTypesId;
        $this->dick_types_id    = $dickTypesId;
    }

    /**
     * @return string
     */
    public function id(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * @return integer
     */
    public function age(): int
    {
        return $this->age;
    }

    /**
     * @return string
     */
    public function genderId(): string
    {
        return $this->gender_id;
    }

    /**
     * @return string
     */
    public function email(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function whatsappUrl(): string
    {
        return $this->whatsapp_url;
    }

    /**
     * @return string
     */
    public function instagramUrl(): string
    {
        return $this->instagram_url;
    }

    /**
     * @return string
     */
    public function facebookUrl(): string
    {
        return $this->facebook_url;
    }

    /**
     * @return bool
     */
    public function isStar(): bool
    {
        return $this->is_star;
    }

    /**
     * @return string
     */
    public function metAt(): string
    {
        return $this->met_at;
    }

    /**
     * @return string
     */
    public function createdAt(): string
    {
        return $this->created_at;
    }

    /**
     * @return string
     */
    public function userId(): string
    {
        return $this->user_id;
    }

    /**
     * @return string
     */
    public function countryId(): string
    {
        return $this->country_id;
    }

    /**
     * @return string
     */
    public function zoneId(): string
    {
        return $this->zone_id;
    }

    /**
     * @return string
     */
    public function eyesTypesId(): string
    {
        return $this->eyes_types_id;
    }

    /**
     * @return string
     */
    public function hairTypesId(): string
    {
        return $this->hair_types_id;
    }

    /**
     * @return string
     */
    public function heightTypesId(): string
    {
        return $this->height_types_id;
    }

    /**
     * @return string
     */
    public function bodyTypesId(): string
    {
        return $this->body_types_id;
    }

    /**
     * @return string
     */
    public function skinTypesId(): string
    {
        return $this->skin_types_id;
    }

    /**
     * @return string
     */
    public function titsTypesId(): string
    {
        return $this->tits_types_id;
    }

    /**
     * @return string
     */
    public function assTypesId(): string
    {
        return $this->ass_types_id;
    }

    /**
     * @return string
     */
    public function dickTypesId(): string
    {
        return $this->dick_types_id;
    }


}
