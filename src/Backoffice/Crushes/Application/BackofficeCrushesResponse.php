<?php

declare(strict_types=1);

namespace Gtto\Backoffice\Crushes\Application;

use Gtto\Shared\Domain\Bus\Query\Response;

final class BackofficeCrushesResponse implements Response
{
    private array $crushes;

    public function __construct(BackofficeCrushResponse ...$crushes)
    {
        $this->crushes = $crushes;
    }

    public function crushes(): array
    {
        return $this->crushes;
    }
}
