<?php

declare(strict_types=1);

namespace Gtto\Tests\Mooc\Courses\Application\Create;

use Gtto\Mooc\Courses\Application\Create\CourseCreator;
use Gtto\Mooc\Courses\Application\Create\CreateCourseCommandHandler;
use Gtto\Tests\Mooc\Courses\CoursesModuleUnitTestCase;
use Gtto\Tests\Mooc\Courses\Domain\CourseCreatedDomainEventMother;
use Gtto\Tests\Mooc\Courses\Domain\CourseMother;

final class CreateCourseCommandHandlerTest extends CoursesModuleUnitTestCase
{
    private $handler;

    protected function setUp(): void
    {
        parent::setUp();

        $this->handler = new CreateCourseCommandHandler(new CourseCreator($this->repository(), $this->eventBus()));
    }

    /** @test */
    public function it_should_create_a_valid_course(): void
    {
        $command = CreateCourseCommandMother::random();

        $course      = CourseMother::fromRequest($command);
        $domainEvent = CourseCreatedDomainEventMother::fromCourse($course);

        $this->shouldSave($course);
        $this->shouldPublishDomainEvent($domainEvent);

        $this->dispatch($command, $this->handler);
    }
}
