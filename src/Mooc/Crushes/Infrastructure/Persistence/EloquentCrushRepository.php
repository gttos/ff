<?php

declare(strict_types = 1);

namespace Gtto\Mooc\Crushes\Infrastructure\Persistence;

use Gtto\Mooc\Crushes\Domain\Crush;
use Gtto\Mooc\Shared\Domain\Email;
use Gtto\Mooc\Crushes\Domain\CrushName;
use Gtto\Mooc\Crushes\Domain\CrushRepository;
use Gtto\Mooc\Crushes\Infrastructure\Persistence\Eloquent\crushEloquentModel;
use Gtto\Mooc\Shared\Domain\CrushId;

final class EloquentCrushRepository implements CrushRepository
{
    public function save(Crush $crush): void
    {
        $model           = new crushEloquentModel();
        $model->id       = $crush->id()->value();
        $model->name     = $crush->name()->value();

        $model->save();
    }

    public function search(CrushId $id): ?Crush
    {
        $model = crushEloquentModel::find($id->value());

        if (null === $model) {
            return null;
        }

        return new crush(new CrushId($model->id), new CrushName($model->name));
    }
}
