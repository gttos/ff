<?php

declare(strict_types = 1);

namespace Gtto\Apps\Mooc\Backend\Controller\Crushes;

use Gtto\Mooc\Crushes\Application\Create\CreateCrushCommand;
use Gtto\Shared\Domain\Bus\Command\CommandBus;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class CrushesPutController
{
    private $bus;

    public function __construct(CommandBus $bus)
    {
        $this->bus = $bus;
    }

    public function __invoke(string $id, Request $request)
    {
        $this->bus->dispatch(
            new CreateCrushCommand(
                $id,
                $request->request->get('name'),
                intval($request->request->get('age')),
                $request->request->get('gender_id'),
                $request->request->get('email'),
                $request->request->get('whatsapp_url'),
                $request->request->get('instagram_url'),
                $request->request->get('facebook_url'),
                boolval($request->request->get('is_star')),
                $request->request->get('met_at'),
                $request->request->get('created_at'),
                $request->request->get('user_id'),
                $request->request->get('country_id'),
                $request->request->get('zone_id'),
                $request->request->get('eyes_types_id'),
                $request->request->get('hair_types_id'),
                $request->request->get('height_types_id'),
                $request->request->get('body_types_id'),
                $request->request->get('skin_types_id'),
                $request->request->get('tits_types_id'),
                $request->request->get('ass_types_id'),
                $request->request->get('dick_types_id'),
            )
        );

        return new Response('', Response::HTTP_CREATED);
    }
}
