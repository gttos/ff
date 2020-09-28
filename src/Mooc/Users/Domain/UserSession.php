<?php

declare(strict_types = 1);

namespace Gtto\Mooc\Users\Domain;

use Gtto\Mooc\Shared\Domain\UserSessionId;
use Gtto\Mooc\Users\Infrastructure\Persistence\Doctrine\UserLastLogin;
use Gtto\Shared\Domain\Aggregate\AggregateRoot;

final class UserSession extends AggregateRoot
{
    private $id;
    private $token;
    private $refresh_token;
    private $expires_in;
    private $last_login;

    public function __construct(UserSessionId $id, string $token, string $refresh_token, string $expires_in, UserLastLogin $last_login)
    {
        $this->id               = $id;
        $this->token            = $token;
        $this->refresh_token    = $refresh_token;
        $this->expires_in       = $expires_in;
        $this->last_login       = $last_login;
    }

    public static function create(UserSessionId $id, string $token, string $refresh_token, string $expires_in, UserLastLogin $last_login): self
    {
        $User = new self($id, $token, $refresh_token, $expires_in, $last_login);

        //$User->record(new UserCreatedDomainEvent($id->value(), $name->value(), $email->value()));

        return $User;
    }
}
