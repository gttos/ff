<?php

declare(strict_types=1);

namespace Gtto\Shared\Domain;

interface RandomNumberGenerator
{
    public function generate(): int;
}
