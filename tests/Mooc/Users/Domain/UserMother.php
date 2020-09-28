<?php

declare(strict_types = 1);

namespace Gtto\Tests\Mooc\Users\Domain;

use Gtto\Mooc\Shared\Domain\Age;
use Gtto\Mooc\Shared\Domain\CountryId;
use Gtto\Mooc\Shared\Domain\CreatedAt;
use Gtto\Mooc\Shared\Domain\Email;
use Gtto\Mooc\Shared\Domain\GenderId;
use Gtto\Mooc\Shared\Domain\UserId;
use Gtto\Mooc\Users\Application\Create\CreateUserCommand;
use Gtto\Mooc\Users\Domain\User;
use Gtto\Mooc\Users\Domain\UserFullName;
use Gtto\Mooc\Users\Domain\UserPin;
use Gtto\Tests\Mooc\Shared\Domain\AgeMother;
use Gtto\Tests\Mooc\Shared\Domain\CountryIdMother;
use Gtto\Tests\Mooc\Shared\Domain\CreatedAtMother;
use Gtto\Tests\Mooc\Shared\Domain\EmailMother;
use Gtto\Tests\Mooc\Shared\Domain\GenderIdMother;
use Gtto\Tests\Mooc\Shared\Domain\UserIdMother;

final class UserMother
{
    public static function create(UserId $id, UserFullName $name, Age $age, GenderId $genderId, CountryId $countryId, Email $email, UserPin $pin, CreatedAt $createdAt): User
    {
        return new User($id, $name, $age, $genderId, $countryId, $email, $pin, $createdAt);
    }

    public static function fromRequest(CreateUserCommand $request): User
    {
        return self::create(
            UserIdMother::create($request->id()),
            UserFullNameMother::create($request->fullName()),
            AgeMother::create($request->age()),
            GenderIdMother::create($request->genderId()),
            CountryIdMother::create($request->countryId()),
            EmailMother::create($request->email()),
            UserPinMother::create($request->pin()),
            CreatedAtMother::create(new \DateTime($request->createdAt()))
        );
    }

    public static function random(): User
    {
        return self::create(UserIdMother::random(), UserFullNameMother::random(), AgeMother::random(),
            GenderIdMother::random(), CountryIdMother::random(), EmailMother::random(), UserPinMother::random(), CreatedAtMother::random());
    }
}
