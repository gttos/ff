<?php

declare(strict_types = 1);

namespace Gtto\Mooc\Users\Infrastructure\Persistence\Eloquent;

use Illuminate\Database\Eloquent\Model;

final class UserEloquentModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $fillable = ['name'];
}
