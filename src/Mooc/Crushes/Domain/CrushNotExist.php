<?php

declare(strict_types = 1);

namespace Gtto\Mooc\Crushes\Domain;

use Gtto\Mooc\Shared\Domain\CrushId;
use Gtto\Shared\Domain\DomainError;

final class CrushNotExist extends DomainError
{
    private $id;

    public function __construct(CrushId $id)
    {
        $this->id = $id;

        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'crush_not_exist';
    }

    protected function errorMessage(): string
    {
        return sprintf('The crush <%s> does not exist', $this->id->value());
    }
}
