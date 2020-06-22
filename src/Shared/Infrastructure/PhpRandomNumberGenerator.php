<?php

declare(strict_types=1);

namespace Gtto\Shared\Infrastructure;

use Gtto\Shared\Domain\RandomNumberGenerator;

final class PhpRandomNumberGenerator implements RandomNumberGenerator
{
    public function generate(): int
    {
        return random_int(1, 5);
    }
}
