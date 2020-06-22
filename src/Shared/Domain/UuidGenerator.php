<?php

declare(strict_types=1);

namespace Gtto\Shared\Domain;

interface UuidGenerator
{
    public function generate(): string;
}
