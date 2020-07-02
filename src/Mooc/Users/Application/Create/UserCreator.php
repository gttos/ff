<?php

declare(strict_types = 1);

namespace Gtto\Mooc\Users\Application\Create;

use Gtto\Mooc\Users\Domain\User;
use Gtto\Mooc\Users\Domain\UserName;
use Gtto\Mooc\Users\Domain\UserRepository;
use Gtto\Mooc\Shared\Domain\User\Age;
use Gtto\Mooc\Shared\Domain\User\CountryId;
use Gtto\Mooc\Shared\Domain\User\UserFacebook;
use Gtto\Mooc\Shared\Domain\User\UserId;
use Gtto\Mooc\Shared\Domain\User\UserInstagram;
use Gtto\Mooc\Shared\Domain\User\UserWhatsapp;
use Gtto\Mooc\Shared\Domain\User\Email;
use Gtto\Mooc\Shared\Domain\User\GenderId;
use Gtto\Mooc\Shared\Domain\User\ZoneId;
use Gtto\Shared\Domain\Bus\Event\EventBus;

final class UserCreator
{
    private $repository;
    private $bus;

    public function __construct(UserRepository $repository, EventBus $bus)
    {
        $this->repository = $repository;
        $this->bus        = $bus;
    }

    private $created_at;
    private $updated_at;
    private $user_id;
    private $country_id;
    private $zone_id;
    private $eye_types_id;
    private $hair_types_id;
    private $height_types_id;
    private $body_types_id;
    private $skin_types_id;
    private $tits_types_id;
    private $ass_types_id;
    private $dick_types_id;

    public function __invoke(
        UserId $id, UserName $name, Age $age,
        CountryId $countryId, Email $email, Pin $pin
    ){
        $User = User::create($id, $name, $email);
        $User->setEmail($email->value());
        if ($zoneId){
            $User->setZoneId($zoneId->value());
        }

        $this->repository->save($User);
        $this->bus->publish(...$User->pullDomainEvents());
    }
}
