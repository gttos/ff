<?php

declare(strict_types=1);

namespace Gtto\Apps\Mooc\Backend\Controller\CoursesCounter;

use Gtto\Mooc\CoursesCounter\Application\Find\CoursesCounterResponse;
use Gtto\Mooc\CoursesCounter\Application\Find\FindCoursesCounterQuery;
use Gtto\Mooc\CoursesCounter\Domain\CoursesCounterNotExist;
use Gtto\Shared\Infrastructure\Symfony\ApiController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class CoursesCounterGetController extends ApiController
{
    public function __invoke()
    {
        /** @var CoursesCounterResponse $response */
        $response = $this->ask(new FindCoursesCounterQuery());

        return new JsonResponse(
            [
                'total' => $response->total(),
            ]
        );
    }

    protected function exceptions(): array
    {
        return [
            CoursesCounterNotExist::class => Response::HTTP_NOT_FOUND,
        ];
    }
}
