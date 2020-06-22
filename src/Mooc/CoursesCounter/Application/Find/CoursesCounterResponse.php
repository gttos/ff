<?php

declare(strict_types=1);

namespace Gtto\Mooc\CoursesCounter\Application\Find;

use Gtto\Shared\Domain\Bus\Query\Response;

final class CoursesCounterResponse implements Response
{
    private int $total;

    public function __construct(int $total)
    {
        $this->total = $total;
    }

    public function total(): int
    {
        return $this->total;
    }
}
