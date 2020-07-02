<?php

declare(strict_types = 1);

namespace Gtto\Mooc\Users\Infrastructure\Persistence;

use Gtto\Mooc\Users\Domain\User;
use Gtto\Mooc\Users\Domain\UserEmail;
use Gtto\Mooc\Users\Domain\UserName;
use Gtto\Mooc\Users\Domain\UserRepository;
use Gtto\Mooc\Users\Infrastructure\Persistence\Eloquent\UserEloquentModel;
use Gtto\Mooc\Shared\Domain\UserId;

final class EloquentUserRepository implements UserRepository
{
    public function save(User $User): void
    {
        $model           = new UserEloquentModel();
        $model->id       = $User->id()->value();
        $model->name     = $User->name()->value();

        $model->save();
    }

    public function search(UserId $id): ?User
    {
        $model = UserEloquentModel::find($id->value());

        if (null === $model) {
            return null;
        }

        return new User(new UserId($model->id), new UserName($model->name));
    }
}
