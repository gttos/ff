<?php

declare(strict_types=1);

namespace Gtto\Apps\Backoffice\Frontend\Controller\Crushes;

use Gtto\Mooc\CrushesCounter\Application\Find\CrushesCounterResponse;
use Gtto\Mooc\CrushesCounter\Application\Find\FindCrushesCounterQuery;
use Gtto\Shared\Domain\ValueObject\Uuid;
use Gtto\Shared\Infrastructure\Symfony\WebController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class CrushesGetWebController extends WebController
{
    protected function exceptions(): array
    {
        return [];
    }

    public function __invoke(Request $request): Response
    {
        /** @var CrushesCounterResponse $crushesCounterResponse */
        $crushesCounterResponse = $this->ask(new FindCrushesCounterQuery());

        return $this->render(
            'pages/crushes/crushes.html.twig',
            [
                'title'           => 'Crushes',
                'description'     => 'Crushes CodelyTV - Backoffice',
                'crushes_counter' => $crushesCounterResponse->total(),
                'new_crush_id'   => Uuid::random()->value(),
            ]
        );
    }
}
