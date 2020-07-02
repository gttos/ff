<?php

declare(strict_types = 1);

namespace Gtto\Mooc\CrushesCounter\Application\Find;

use Gtto\Shared\Domain\Bus\Query\Response;

final class CrushesCounterResponse implements Response
{
    private $total;

    public function __construct(int $total)
    {
        $this->total = $total;
    }

    public function total(): int
    {
        return $this->total;
    }
}
