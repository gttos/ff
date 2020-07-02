<?php

declare(strict_types = 1);

namespace Gtto\Mooc\Users\Application\Create;

use Gtto\Mooc\Users\Domain\UserName;
use Gtto\Mooc\Shared\Domain\UserId;
use Gtto\Shared\Domain\Bus\Command\CommandHandler;

final class CreateUserCommandHandler implements CommandHandler
{
    private $creator;

    public function __construct(UserCreator $creator)
    {
        $this->creator = $creator;
    }

    public function __invoke(CreateUserCommand $command)
    {
        $id       = new UserId($command->id());
        $name     = new UserName($command->name());

        $this->creator->__invoke($id, $name);
    }
}
