<?php

declare(strict_types = 1);

namespace Gtto\Tests\Mooc\Crushes\Domain;

use Gtto\Mooc\Crushes\Domain\Crush;
use Gtto\Mooc\Crushes\Domain\CrushCreatedDomainEvent;
use Gtto\Mooc\Shared\Domain\Email;
use Gtto\Mooc\Crushes\Domain\CrushName;
use Gtto\Mooc\Shared\Domain\CrushId;
use Gtto\Tests\Mooc\Shared\Domain\EmailMother;

final class CrushCreatedDomainEventMother
{
    public static function create(CrushId $id, CrushName $name, Email $email): CrushCreatedDomainEvent
    {
        return new CrushCreatedDomainEvent($id->value(), $name->value(), $email->value());
    }

    public static function fromCrush(Crush $crushes): CrushCreatedDomainEvent
    {
        return self::create($crushes->id(), $crushes->name(), $crushes->email());
    }

    public static function random(): CrushCreatedDomainEvent
    {
        return self::create(CrushIdMother::random(), CrushNameMother::random(), EmailMother::random());
    }
}
