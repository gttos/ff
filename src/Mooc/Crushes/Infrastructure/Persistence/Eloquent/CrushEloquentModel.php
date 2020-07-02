<?php

declare(strict_types = 1);

namespace Gtto\Mooc\Crushes\Infrastructure\Persistence\Eloquent;

use Illuminate\Database\Eloquent\Model;

final class CrushEloquentModel extends Model
{
    protected $table = 'crushes';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $fillable = ['name'];
}
