<?php

declare(strict_types=1);

namespace Gtto\Backoffice\Crushes\Domain;

use Gtto\Shared\Domain\Aggregate\AggregateRoot;

final class BackofficeCrush extends AggregateRoot
{
    private string $id;
    private string $name;

    public function __construct(string $id, string $name)
    {
        $this->id       = $id;
        $this->name     = $name;
    }

    public static function fromPrimitives(array $primitives): BackofficeCrush
    {
        return new self($primitives['id'], $primitives['name']);
    }

    public function toPrimitives(): array
    {
        return [
            'id'       => $this->id,
            'name'     => $this->name
        ];
    }

    public function id(): string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

}
