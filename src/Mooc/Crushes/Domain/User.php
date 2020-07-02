<?php

declare(strict_types = 1);

namespace Gtto\Mooc\Crushes\Domain;

use Carbon\Carbon;
use Gtto\Mooc\Shared\Domain\Email;
use Gtto\Mooc\Shared\Domain\UserAccountId;
use Gtto\Mooc\Shared\Domain\UserId;
use Gtto\Mooc\Shared\Domain\UserSessionId;
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
        $crush = new self($id, $email, $userSessionId, $userAccountId);

        $crush->setName($params['name']);
        $crush->setAge($params['age']);
        $crush->setCountryId($params['countryId']);

        $crush->record(new CrushCreatedDomainEvent($id->value(), $email->value()));

        return $crush;
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
