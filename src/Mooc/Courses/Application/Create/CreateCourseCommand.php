<?php

declare(strict_types=1);

namespace Gtto\Mooc\Courses\Application\Create;

use Gtto\Shared\Domain\Bus\Command\Command;

final class CreateCourseCommand implements Command
{
    private string $id;
    private string $name;
    private string $duration;

    public function __construct(string $id, string $name, string $duration)
    {
        $this->id       = $id;
        $this->name     = $name;
        $this->duration = $duration;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function duration(): string
    {
        return $this->duration;
    }
}
