<?php

declare(strict_types=1);

namespace Gtto\Apps\Backoffice\Frontend\Controller\Crushes;

use Gtto\Mooc\Crushes\Application\Create\CreateCrushCommand;
use Gtto\Shared\Infrastructure\Symfony\WebController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use Symfony\Component\Validator\Validation;

final class CrushesPostWebController extends WebController
{
    protected function exceptions(): array
    {
        return [];
    }

    public function __invoke(Request $request): RedirectResponse
    {
        $validationErrors = $this->validateRequest($request);

        return $validationErrors->count()
            ? $this->redirectWithErrors('crushes_get', $validationErrors, $request)
            : $this->createCrush($request);
    }

    private function validateRequest(Request $request): ConstraintViolationListInterface
    {
        $constraint = new Assert\Collection(
            [
                'id'       => new Assert\Uuid(),
                'name'     => [new Assert\NotBlank(), new Assert\Length(['min' => 1, 'max' => 255])]
            ]
        );

        $input = $request->request->all();

        return Validation::createValidator()->validate($input, $constraint);
    }

    private function createCrush(Request $request): RedirectResponse
    {
        $this->dispatch(
            new CreateCrushCommand(
                $request->request->get('id'),
                $request->request->get('name')
            )
        );

        return $this->redirectWithMessage(
            'crushes_get',
            sprintf('Feliciades, el curso %s ha sido creado!', $request->request->get('name'))
        );
    }
}
