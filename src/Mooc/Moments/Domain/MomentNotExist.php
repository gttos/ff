<?php

declare(strict_types = 1);

namespace Gtto\Mooc\Moments\Domain;

use Gtto\Mooc\Shared\Domain\MomentId;
use Gtto\Shared\Domain\DomainError;

final class MomentNotExist extends DomainError
{
    private $id;

    public function __construct(MomentId $id)
    {
        $this->id = $id;

        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'moment_not_exist';
    }

    protected function errorMessage(): string
    {
        return sprintf('The moment <%s> does not exist', $this->id->value());
    }
}
