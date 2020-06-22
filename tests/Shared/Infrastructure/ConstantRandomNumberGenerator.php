<?php

declare(strict_types=1);

namespace Gtto\Tests\Shared\Infrastructure;

use Gtto\Shared\Domain\RandomNumberGenerator;

final class ConstantRandomNumberGenerator implements RandomNumberGenerator
{
    public function generate(): int
    {
        return 1;
    }
}
