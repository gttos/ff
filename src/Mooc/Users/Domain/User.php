<?php

declare(strict_types = 1);

namespace Gtto\Mooc\Users\Domain;

use Carbon\Carbon;
use Gtto\Mooc\Shared\Domain\User\Email;
use Gtto\Mooc\Shared\Domain\User\UserAccountId;
use Gtto\Mooc\Shared\Domain\User\UserId;
use Gtto\Mooc\Shared\Domain\User\UserSessionId;
use Gtto\Shared\Domain\Aggregate\AggregateRoot;

final class User extends AggregateRoot
{
    private $id;
    private $name;
    private $age;
    private $email;
    private $country_id;
    private $user_session_id;
    private $user_account_id;

    public function __construct(UserId $id, Email $email, UserSessionId $userSessionId, UserAccountId $userAccountId)
    {
        $this->id               = $id;
        $this->email            = $email;
        $this->user_session_id  = $userSessionId;
        $this->user_account_id  = $userAccountId;
        $this->created_at       = Carbon::now('UTC');
    }

    public static function create(UserId $id, Email $email, UserSessionId $userSessionId, UserAccountId $userAccountId, ...$params): self´
    {
        $User = new self($id, $email, $userSessionId, $userAccountId);

        $User->setName($params['name']);
        $User->setAge($params['age']);
        $User->setCountryId($params['countryId']);

        $User->record(new UserCreatedDomainEvent($id->value(), $email->value()));

        return $User;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age): void
    {
        $this->age = $age;
    }

    /**
     * @param mixed $country_id
     */
    public function setCountryId($country_id): void
    {
        $this->country_id = $country_id;
    }


}
