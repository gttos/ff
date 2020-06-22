<?php

declare(strict_types=1);

namespace Gtto\Mooc\Courses\Domain;

use Gtto\Mooc\Shared\Domain\Course\CourseId;
use Gtto\Shared\Domain\DomainError;

final class CourseNotExist extends DomainError
{
    private CourseId $id;

    public function __construct(CourseId $id)
    {
        $this->id = $id;

        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'course_not_exist';
    }

    protected function errorMessage(): string
    {
        return sprintf('The course <%s> does not exist', $this->id->value());
    }
}
