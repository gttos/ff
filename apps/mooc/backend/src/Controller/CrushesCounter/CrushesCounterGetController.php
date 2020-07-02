<?php

declare(strict_types=1);

namespace Gtto\Apps\Mooc\Backend\Controller\CrushesCounter;

use Gtto\Mooc\CrushesCounter\Application\Find\CrushesCounterResponse;
use Gtto\Mooc\CrushesCounter\Application\Find\FindCrushesCounterQuery;
use Gtto\Mooc\CrushesCounter\Domain\CrushesCounterNotExist;
use Gtto\Shared\Infrastructure\Symfony\ApiController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class CrushesCounterGetController extends ApiController
{
    public function __invoke()
    {
        /** @var CrushesCounterResponse $response */
        $response = $this->ask(new FindCrushesCounterQuery());

        return new JsonResponse(
            [
                'total' => $response->total(),
            ]
        );
    }

    protected function exceptions(): array
    {
        return [
            CrushesCounterNotExist::class => Response::HTTP_NOT_FOUND,
        ];
    }
}