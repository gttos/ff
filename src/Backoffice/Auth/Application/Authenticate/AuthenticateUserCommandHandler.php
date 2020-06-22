<?php

declare(strict_types=1);

namespace Gtto\Backoffice\Auth\Application\Authenticate;

use Gtto\Backoffice\Auth\Domain\AuthPassword;
use Gtto\Backoffice\Auth\Domain\AuthUsername;
use Gtto\Shared\Domain\Bus\Command\CommandHandler;

final class AuthenticateUserCommandHandler implements CommandHandler
{
    private UserAuthenticator $authenticator;

    public function __construct(UserAuthenticator $authenticator)
    {
        $this->authenticator = $authenticator;
    }

    public function __invoke(AuthenticateUserCommand $command): void
    {
        $username = new AuthUsername($command->username());
        $password = new AuthPassword($command->password());

        $this->authenticator->authenticate($username, $password);
    }
}
