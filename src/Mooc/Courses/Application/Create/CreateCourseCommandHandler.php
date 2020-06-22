<?php

declare(strict_types=1);

namespace Gtto\Mooc\Courses\Application\Create;

use Gtto\Mooc\Courses\Domain\CourseDuration;
use Gtto\Mooc\Courses\Domain\CourseName;
use Gtto\Mooc\Shared\Domain\Course\CourseId;
use Gtto\Shared\Domain\Bus\Command\CommandHandler;

final class CreateCourseCommandHandler implements CommandHandler
{
    private CourseCreator $creator;

    public function __construct(CourseCreator $creator)
    {
        $this->creator = $creator;
    }

    public function __invoke(CreateCourseCommand $command): void
    {
        $id       = new CourseId($command->id());
        $name     = new CourseName($command->name());
        $duration = new CourseDuration($command->duration());

        $this->creator->__invoke($id, $name, $duration);
    }
}
