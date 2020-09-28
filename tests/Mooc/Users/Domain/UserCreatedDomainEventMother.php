<?php

declare(strict_types = 1);

namespace Gtto\Tests\Mooc\Users\Domain;

use Gtto\Mooc\Shared\Domain\Age;
use Gtto\Mooc\Shared\Domain\CountryId;
use Gtto\Mooc\Shared\Domain\Email;
use Gtto\Mooc\Shared\Domain\GenderId;
use Gtto\Mooc\Users\Domain\User;
use Gtto\Mooc\Shared\Domain\CreatedAt;
use Gtto\Mooc\Shared\Domain\UserId;
use Gtto\Mooc\Users\Domain\UserCreatedDomainEvent;
use Gtto\Mooc\Users\Domain\UserFullName;
use Gtto\Tests\Mooc\Shared\Domain\AgeMother;
use Gtto\Tests\Mooc\Shared\Domain\CountryIdMother;
use Gtto\Tests\Mooc\Shared\Domain\CreatedAtMother;
use Gtto\Tests\Mooc\Shared\Domain\EmailMother;
use Gtto\Tests\Mooc\Shared\Domain\GenderIdMother;
use Gtto\Tests\Mooc\Shared\Domain\UserIdMother;

final class UserCreatedDomainEventMother
{
    public static function create(UserId $id, UserFullName $name, Age $age, GenderId $genderId, CountryId $countryId, Email $email, CreatedAt $createdAt): UserCreatedDomainEvent
    {
        return new UserCreatedDomainEvent($id->value(), $name->value(), $email->value());
    }

    public static function fromUser(User $users): UserCreatedDomainEvent
    {
        return self::create($users->id(), $users->fullName(), $users->age(), $users->genderId(), $users->countryId(), $users->email(), $users->createdAt());
    }

    public static function random(): UserCreatedDomainEvent
    {
        return self::create(UserIdMother::random(), UserFullNameMother::random(), AgeMother::random(),
            GenderIdMother::random(), CountryIdMother::random(), EmailMother::random(), CreatedAtMother::random());
    }
}
