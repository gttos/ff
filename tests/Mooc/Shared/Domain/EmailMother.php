<?php

declare(strict_types = 1);

namespace Gtto\Tests\Mooc\Shared\Domain;

use Gtto\Mooc\Shared\Domain\Email;

final class EmailMother
{
    public static function create(string $value): Email
    {
        return new Email($value);
    }

    public static function random(): Email
    {
        return self::create('test@ff.com');
    }
}
