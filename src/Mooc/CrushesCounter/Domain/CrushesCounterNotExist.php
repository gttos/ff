<?php

declare(strict_types = 1);

namespace Gtto\Mooc\CrushesCounter\Domain;

use RuntimeException;

final class CrushesCounterNotExist extends RuntimeException
{
    public function __construct()
    {
        parent::__construct('The crushes counter not exist');
    }
}
