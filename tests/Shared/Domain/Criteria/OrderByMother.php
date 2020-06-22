<?php

declare(strict_types=1);

namespace Gtto\Tests\Shared\Domain\Criteria;

use Gtto\Shared\Domain\Criteria\OrderBy;
use Gtto\Tests\Shared\Domain\WordMother;

final class OrderByMother
{
    public static function create($fieldName): OrderBy
    {
        return new OrderBy($fieldName);
    }

    public static function random(): OrderBy
    {
        return self::create(WordMother::random());
    }
}
