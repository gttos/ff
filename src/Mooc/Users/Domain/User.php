<?php

declare(strict_types = 1);

namespace Gtto\Mooc\Users\Domain;

use Gtto\Mooc\Shared\Domain\Age;
use Gtto\Mooc\Shared\Domain\CreatedAt;
use Gtto\Mooc\Shared\Domain\Email;
use Gtto\Mooc\Shared\Domain\GenderId;
use Gtto\Mooc\Shared\Domain\CountryId;
use Gtto\Mooc\Shared\Domain\UserId;
use Gtto\Shared\Domain\Aggregate\AggregateRoot;

final class User extends AggregateRoot
{
    private $id;
    private $fullname;
    private $age;
    private $gender_id;
    private $country_id;
    private $email;
    private $pin;
    private $created_at;

    public function __construct(
        UserId $id,
        UserFullName $name,
        Age $age,
        GenderId $genderId,
        CountryId $countryId,
        Email $email,
        UserPin $pin,
        CreatedAt $createdAt
    ){
        $this->id               = $id;
        $this->fullname         = $name;
        $this->age              = $age;
        $this->gender_id        = $genderId;
        $this->country_id       = $countryId;
        $this->email            = $email;
        $this->pin              = $pin;
        $this->created_at       = $createdAt;
    }

    public static function create(UserId $id, UserFullName $name, Age $age, GenderId $genderId, CountryId $countryId, Email $email, UserPin $pin, CreatedAt $createdAt): self
    {
        $user = new self($id, $name, $age, $genderId, $countryId, $email, $pin, $createdAt);
        $user->record(new UserCreatedDomainEvent($id->value(), $name->value()));

        return $user;
    }

    /**
     * @return UserId
     */
    public function id(): UserId
    {
        return $this->id;
    }

    /**
     * @return UserFullName
     */
    public function fullName(): UserFullName
    {
        return $this->fullname;
    }

    /**
     * @param $newName
     * @return UserFullName
     */
    public function rename($newName): UserFullName
    {
        return $this->fullname = $newName;
    }

    /**
     * @return Age
     */
    public function age(): Age
    {
        return $this->age;
    }

    /**
     * @return CountryId
     */
    public function countryId(): CountryId
    {
        return $this->country_id;
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
     * @return CreatedAt
     */
    public function createdAt(): CreatedAt
    {
        return $this->created_at;
    }

}
