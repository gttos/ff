<?php

declare(strict_types = 1);

namespace Gtto\Mooc\Users\Application\Create;

use Gtto\Mooc\Shared\Domain\Age;
use Gtto\Mooc\Shared\Domain\CountryId;
use Gtto\Mooc\Shared\Domain\CreatedAt;
use Gtto\Mooc\Shared\Domain\Email;
use Gtto\Mooc\Shared\Domain\GenderId;
use Gtto\Mooc\Shared\Domain\UserId;
use Gtto\Mooc\Users\Domain\User;
use Gtto\Mooc\Users\Domain\UserFullName;
use Gtto\Mooc\Users\Domain\UserPin;
use Gtto\Mooc\Users\Domain\UserRepository;
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

    public function __invoke(
        UserId $id, UserFullName $name, Age $age, GenderId $genderId,
        CountryId $countryId, Email $email, UserPin $pin, CreatedAt $createdAt
    ){
        $User = User::create($id, $name, $age, $genderId, $countryId, $email, $pin, $createdAt);

        $this->repository->save($User);
        $this->bus->publish(...$User->pullDomainEvents());
    }
}
