<?php

declare(strict_types = 1);

namespace Gtto\Tests\Backoffice\Crushes\Domain;

use Gtto\Backoffice\Crushes\Domain\BackofficeCrush;
use Gtto\Tests\Mooc\Shared\Domain\EmailMother;
use Gtto\Tests\Mooc\Crushes\Domain\CrushIdMother;
use Gtto\Tests\Mooc\Crushes\Domain\CrushNameMother;

final class BackofficeCrushMother
{
    public static function create(string $id, string $name, string $email): BackofficeCrush
    {
        return new BackofficeCrush($id, $name, $email);
    }

    public static function withName(string $name)
    {
        return self::create(
            CrushIdMother::random()->value(),
            $name,
            EmailMother::random()->value()
        );
    }

    public static function random(): BackofficeCrush
    {
        return self::create(
            CrushIdMother::random()->value(),
            CrushNameMother::random()->value(),
            EmailMother::random()->value()
        );
    }
}
