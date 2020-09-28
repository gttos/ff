<?php

declare(strict_types = 1);

namespace Gtto\Mooc\Users\Domain;

use Gtto\Mooc\Shared\Domain\UserId;
use Gtto\Shared\Domain\DomainError;

final class UserNotExist extends DomainError
{
    private $id;

    public function __construct(UserId $id)
    {
        $this->id = $id;

        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'user_not_exist';
    }

    protected function errorMessage(): string
    {
        return sprintf('The user <%s> does not exist', $this->id->value());
    }
}
