<?php

declare(strict_types=1);

namespace Gtto\Tests\Backoffice\Courses\Domain;

use Gtto\Shared\Domain\Criteria\Criteria;
use Gtto\Tests\Shared\Domain\Criteria\CriteriaMother;
use Gtto\Tests\Shared\Domain\Criteria\FilterMother;
use Gtto\Tests\Shared\Domain\Criteria\FiltersMother;

final class BackofficeCourseCriteriaMother
{
    public static function nameContains(string $text): Criteria
    {
        return CriteriaMother::create(
            FiltersMother::createOne(
                FilterMother::fromValues(
                    [
                        'field'    => 'name',
                        'operator' => 'CONTAINS',
                        'value'    => $text,
                    ]
                )
            )
        );
    }
}
