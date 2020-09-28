<?php

declare(strict_types = 1);

namespace Gtto\Tests\Mooc\Users\Application\Create;

use Gtto\Mooc\Shared\Domain\Age;
use Gtto\Mooc\Shared\Domain\CountryId;
use Gtto\Mooc\Shared\Domain\CreatedAt;
use Gtto\Mooc\Shared\Domain\Email;
use Gtto\Mooc\Shared\Domain\GenderId;
use Gtto\Mooc\Shared\Domain\UserId;
use Gtto\Mooc\Users\Application\Create\CreateUserCommand;
use Gtto\Mooc\Users\Domain\UserFullName;
use Gtto\Mooc\Users\Domain\UserPin;
use Gtto\Tests\Mooc\Shared\Domain\AgeMother;
use Gtto\Tests\Mooc\Shared\Domain\CountryIdMother;
use Gtto\Tests\Mooc\Shared\Domain\CreatedAtMother;
use Gtto\Tests\Mooc\Shared\Domain\EmailMother;
use Gtto\Tests\Mooc\Shared\Domain\GenderIdMother;
use Gtto\Tests\Mooc\Shared\Domain\UserIdMother;
use Gtto\Tests\Mooc\Users\Domain\UserFullNameMother;
use Gtto\Tests\Mooc\Users\Domain\UserPinMother;

final class CreateUserCommandMother
{
    public static function create(UserId $id, UserFullName $name, Age $age, GenderId $genderId, CountryId $countryId, Email $email, UserPin $pin, CreatedAt $createdAt): CreateUserCommand {
        return new CreateUserCommand($id->value(), $name->value(), $age->value(), $genderId->value(), $countryId->value(),
            $email->value(), $pin->value(), $createdAt->value());
    }

    public static function random(): CreateUserCommand
    {
        return self::create(UserIdMother::random(), UserFullNameMother::random(), AgeMother::random(),
            GenderIdMother::random(), CountryIdMother::random(), EmailMother::random(), UserPinMother::random(), CreatedAtMother::random());
    }
}
