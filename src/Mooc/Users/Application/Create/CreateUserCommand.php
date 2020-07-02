<?php

declare(strict_types = 1);

namespace Gtto\Mooc\Users\Application\Create;

use Gtto\Shared\Domain\Bus\Command\Command;

final class CreateUserCommand implements Command
{
    private $id;
    private $name;
    private $email;

    public function __construct(string $id, string $name)
    {
        $this->id       = $id;
        $this->name     = $name;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

}
