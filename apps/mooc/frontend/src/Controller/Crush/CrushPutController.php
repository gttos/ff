<?php

declare(strict_types = 1);

namespace Gtto\Apps\Mooc\Frontend\Controller\Crush;

use Gtto\Shared\Domain\RandomNumberGenerator;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class CrushPutController
{
    private $generator;

    public function __construct(RandomNumberGenerator $generator)
    {
        $this->generator = $generator;
    }

    public function __invoke(Request $request): Response
    {
        return new JsonResponse(
            [
                'mooc-backend' => 'ok',
                'rand'         => $this->generator->generate(),
            ]
        );
    }
}
