<?php

declare(strict_types = 1);

namespace Gtto\Mooc\Users\Domain;

use Carbon\Carbon;
use Gtto\Mooc\Shared\Domain\User\Age;
use Gtto\Mooc\Shared\Domain\User\AssTypesId;
use Gtto\Mooc\Shared\Domain\User\BodyTypesId;
use Gtto\Mooc\Shared\Domain\User\CountryId;
use Gtto\Mooc\Shared\Domain\User\UserFacebook;
use Gtto\Mooc\Shared\Domain\User\UserId;
use Gtto\Mooc\Shared\Domain\User\UserInstagram;
use Gtto\Mooc\Shared\Domain\User\UserWhatsapp;
use Gtto\Mooc\Shared\Domain\User\DickTypesId;
use Gtto\Mooc\Shared\Domain\User\Email;
use Gtto\Mooc\Shared\Domain\User\EyesTypesId;
use Gtto\Mooc\Shared\Domain\User\GenderId;
use Gtto\Mooc\Shared\Domain\User\HairTypesId;
use Gtto\Mooc\Shared\Domain\User\HeightTypesId;
use Gtto\Mooc\Shared\Domain\User\SkinTypesId;
use Gtto\Mooc\Shared\Domain\User\TitTypesId;
use Gtto\Mooc\Shared\Domain\User\UserSessionId;
use Gtto\Mooc\Shared\Domain\User\ZoneId;
use Gtto\Shared\Domain\Aggregate\AggregateRoot;
use Symfony\Component\Validator\Constraints\Date;

final class UserSession extends AggregateRoot
{
    private $id;
    private $token;
    private $refresh_token;
    private $expires_in;
    private $last_login;


    public function __construct(UserSessionId $id, UserName $name, Age $age, GenderId $genderId, \DateTime $metAt, ZoneId $zoneId, CountryId $countryId, UserId $userId)
    {
        $this->id               = $id;
        $this->name             = $name;
        $this->age              = $age;
        $this->met_at           = $metAt;
        $this->gender_id           = $genderId;
        $this->zone_id          = $zoneId;
        $this->user_id          = $userId;
        $this->country_id       = $countryId;
        $this->created_at       = Carbon::now('UTC');
    }

    public static function create(UserId $id, UserName $name, Age $age, GenderId $genderId, \DateTime $metAt, ZoneId $zoneId, CountryId $countryId, UserId $userId): self
    {
        $User = new self($id, $name, $age, $genderId, $metAt, $zoneId, $countryId, $userId);

        $User->record(new UserCreatedDomainEvent($id->value(), $name->value(), $email->value()));

        return $User;
    }

    public function id(): UserId
    {
        return $this->id;
    }

    public function name(): UserName
    {
        return $this->name;
    }

    public function age(): Age
    {
        return $this->age;
    }
}
