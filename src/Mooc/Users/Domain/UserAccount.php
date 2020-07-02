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
use Gtto\Mooc\Shared\Domain\User\EyeTypesId;
use Gtto\Mooc\Shared\Domain\User\GenderId;
use Gtto\Mooc\Shared\Domain\User\HairTypesId;
use Gtto\Mooc\Shared\Domain\User\HeightTypesId;
use Gtto\Mooc\Shared\Domain\User\PlanId;
use Gtto\Mooc\Shared\Domain\User\SkinTypesId;
use Gtto\Mooc\Shared\Domain\User\TitTypesId;
use Gtto\Mooc\Shared\Domain\User\UserAccountId;
use Gtto\Mooc\Shared\Domain\User\ZoneId;
use Gtto\Shared\Domain\Aggregate\AggregateRoot;
use Symfony\Component\Validator\Constraints\Date;

final class UserAccount extends AggregateRoot
{
    private $id;
    private $plan_id;
    private $coins;

    public function __construct(UserAccountId $id, PlanId $planId)
    {
        $this->id       = $id;
        $this->plan_id  = $planId;
        $this->coins    = 0;
    }

    public static function create(UserId $id, UserName $name, Age $age, GenderId $genderId, \DateTime $metAt, ZoneId $zoneId, CountryId $countryId, UserId $userId): self
    {
        $User = new self($id, $name, $age, $genderId, $metAt, $zoneId, $countryId, $userId);

        $User->record(new UserCreatedDomainEvent($id->value(), $name->value(), $email->value()));

        return $User;
    }
}
