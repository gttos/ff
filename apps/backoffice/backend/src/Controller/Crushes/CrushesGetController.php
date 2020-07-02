<?php

declare(strict_types=1);

namespace Gtto\Apps\Backoffice\Backend\Controller\Crushes;

use Gtto\Backoffice\Crushes\Application\BackofficeCrushResponse;
use Gtto\Backoffice\Crushes\Application\BackofficeCrushesResponse;
use Gtto\Backoffice\Crushes\Application\SearchByCriteria\SearchBackofficeCrushesByCriteriaQuery;
use Gtto\Shared\Domain\Bus\Query\QueryBus;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use function Lambdish\Phunctional\map;

final class CrushesGetController
{
    private $queryBus;

    public function __construct(QueryBus $queryBus)
    {
        $this->queryBus = $queryBus;
    }

    public function __invoke(Request $request): JsonResponse
    {
        /** @var BackofficeCrushesResponse $response */
        $response = $this->queryBus->ask(
            new SearchBackofficeCrushesByCriteriaQuery(
                $request->query->get('filters', []),
                $request->query->get('order_by'),
                $request->query->get('order'),
                $request->query->get('limit'),
                $request->query->get('offset')
            )
        );

        return new JsonResponse(
            map(
                fn(BackofficeCrushResponse $crush) => [
                    'id'       => $crush->id(),
                    'name'     => $crush->name()
                ],
                $response->crushes()
            ),
            200,
            ['Access-Control-Allow-Origin' => '*']
        );
    }
}
