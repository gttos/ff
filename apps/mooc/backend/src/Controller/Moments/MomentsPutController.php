<?php

declare(strict_types = 1);

namespace Gtto\Apps\Mooc\Backend\Controller\Moments;

use Gtto\Mooc\Moments\Application\Create\CreateMomentCommand;
use Gtto\Shared\Domain\Bus\Command\CommandBus;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class MomentsPutController
{
    private $bus;

    public function __construct(CommandBus $bus)
    {
        $this->bus = $bus;
    }

    public function __invoke(string $id, Request $request)
    {
        $this->bus->dispatch(
            new CreateMomentCommand(
                $id,
                $request->request->get('place_id'),
                $request->request->get('story'),
                intval($request->request->get('rate')),
                $request->request->get('date'),
                $request->request->get('crush_id'),
                $request->request->get('user_id'),
                $request->request->get('created_at')
            )
        );

        return new Response('', Response::HTTP_CREATED);
    }
}
