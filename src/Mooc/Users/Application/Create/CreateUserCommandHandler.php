<?php

declare(strict_types = 1);

namespace Gtto\Mooc\Users\Application\Create;

use Gtto\Mooc\Shared\Domain\Age;
use Gtto\Mooc\Shared\Domain\CountryId;
use Gtto\Mooc\Shared\Domain\CreatedAt;
use Gtto\Mooc\Shared\Domain\Email;
use Gtto\Mooc\Shared\Domain\GenderId;
use Gtto\Mooc\Users\Domain\UserFullName;
use Gtto\Mooc\Shared\Domain\UserId;
use Gtto\Mooc\Users\Domain\UserPin;
use Gtto\Shared\Domain\Bus\Command\CommandHandler;

final class CreateUserCommandHandler implements CommandHandler
{
    private $creator;

    public function __construct(UserCreator $creator)
    {
        $this->creator = $creator;
    }

    public function __invoke(CreateUserCommand $command)
    {
        $id       = new UserId($command->id());
        $name     = new UserFullName($command->fullName());
        $age            = new Age($command->age());
        $genderId       = new GenderId($command->genderId());
        $countryId      = new CountryId($command->countryId());
        $email          = new Email($command->email());
        $pin          = new UserPin($command->pin());
        $createdAt      = new CreatedAt(new \DateTime($command->createdAt()));

        $this->creator->__invoke($id, $name, $age, $genderId, $countryId, $email, $pin, $createdAt);
    }
}
