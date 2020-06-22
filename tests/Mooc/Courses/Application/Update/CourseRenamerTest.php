<?php

declare(strict_types=1);

namespace Gtto\Tests\Mooc\Courses\Application\Update;

use Gtto\Mooc\Courses\Application\Update\CourseRenamer;
use Gtto\Mooc\Courses\Domain\CourseNotExist;
use Gtto\Tests\Mooc\Courses\CoursesModuleUnitTestCase;
use Gtto\Tests\Mooc\Courses\Domain\CourseIdMother;
use Gtto\Tests\Mooc\Courses\Domain\CourseMother;
use Gtto\Tests\Mooc\Courses\Domain\CourseNameMother;
use Gtto\Tests\Shared\Domain\DuplicatorMother;

final class CourseRenamerTest extends CoursesModuleUnitTestCase
{
    private $renamer;

    protected function setUp(): void
    {
        parent::setUp();

        $this->renamer = new CourseRenamer($this->repository(), $this->eventBus());
    }

    /** @test */
    public function it_should_rename_an_existing_course(): void
    {
        $course        = CourseMother::random();
        $newName       = CourseNameMother::random();
        $renamedCourse = DuplicatorMother::with($course, ['name' => $newName]);

        $this->shouldSearch($course->id(), $course);
        $this->shouldSave($renamedCourse);
        $this->shouldNotPublishDomainEvent();

        $this->renamer->__invoke($course->id(), $newName);
    }

    /** @test */
    public function it_should_throw_an_exception_when_the_course_not_exist(): void
    {
        $this->expectException(CourseNotExist::class);

        $id = CourseIdMother::random();

        $this->shouldSearch($id, null);

        $this->renamer->__invoke($id, CourseNameMother::random());
    }
}
