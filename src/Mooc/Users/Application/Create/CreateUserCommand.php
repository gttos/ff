<?php

declare(strict_types = 1);

namespace Gtto\Mooc\Users\Application\Create;

use Gtto\Shared\Domain\Bus\Command\Command;

final class CreateUserCommand implements Command
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
        string $id,
        string $name,
        int $age,
        string $genderId,
        string $countryId,
        string $email,
        int $pin,
        string $createdAt
    ){
        $this->id               = $id;
        $this->fullname             = $name;
        $this->age              = $age;
        $this->gender_id        = $genderId;
        $this->country_id       = $countryId;
        $this->email            = $email;
        $this->pin              = $pin;
        $this->created_at       = $createdAt;
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
    public function fullName(): string
    {
        return $this->fullname;
    }

    /**
     * @return integer
     */
    public function age(): int
    {
        return $this->age;
    }

    /**
     * @return integer
     */
    public function pin(): int
    {
        return $this->pin;
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
    public function createdAt(): string
    {
        return $this->created_at;
    }

    /**
     * @return string
     */
    public function countryId(): string
    {
        return $this->country_id;
    }
}
