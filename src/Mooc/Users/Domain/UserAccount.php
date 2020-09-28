<?php

declare(strict_types = 1);

namespace Gtto\Mooc\Users\Domain;

use Gtto\Mooc\Shared\Domain\PlanId;
use Gtto\Mooc\Shared\Domain\UserAccountId;
use Gtto\Shared\Domain\Aggregate\AggregateRoot;

final class UserAccount extends AggregateRoot
{
    private $id;
    private $plan_id;
    private $coins;

    public function __construct(UserAccountId $id, PlanId $planId)
    {
        $this->id       = $id;
        $this->plan_id  = $planId;
        $this->coins    = 0;
    }

    public static function create(UserAccountId $id, PlanId $planId): self
    {
        $userAccount = new self($id, $planId);

        // $User->record(new UserCreatedDomainEvent($id->value(), $name->value(), $email->value()));

        return $userAccount;
    }
}
