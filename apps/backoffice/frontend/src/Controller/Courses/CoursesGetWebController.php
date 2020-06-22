<?php

declare(strict_types=1);

namespace Gtto\Apps\Backoffice\Frontend\Controller\Courses;

use Gtto\Mooc\CoursesCounter\Application\Find\CoursesCounterResponse;
use Gtto\Mooc\CoursesCounter\Application\Find\FindCoursesCounterQuery;
use Gtto\Shared\Domain\ValueObject\Uuid;
use Gtto\Shared\Infrastructure\Symfony\WebController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class CoursesGetWebController extends WebController
{
    protected function exceptions(): array
    {
        return [];
    }

    public function __invoke(Request $request): Response
    {
        /** @var CoursesCounterResponse $coursesCounterResponse */
        $coursesCounterResponse = $this->ask(new FindCoursesCounterQuery());

        return $this->render(
            'pages/courses/courses.html.twig',
            [
                'title'           => 'Courses',
                'description'     => 'Courses CodelyTV - Backoffice',
                'courses_counter' => $coursesCounterResponse->total(),
                'new_course_id'   => Uuid::random()->value(),
            ]
        );
    }
}
