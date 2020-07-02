<?php

declare(strict_types = 1);

namespace Gtto\Mooc\Crushes\Infrastructure\Persistence;

use Gtto\Mooc\Crushes\Domain\Crush;
use Gtto\Mooc\Crushes\Domain\CrushRepository;
use Gtto\Mooc\Shared\Domain\CrushId;

final class FileCrushRepository implements CrushRepository
{
    private const FILE_PATH = __DIR__ . '/crushes';

    public function save(Crush $crush): void
    {
        file_put_contents($this->fileName($crush->id()->value()), serialize($crush));
    }

    public function search(CrushId $id): ?Crush
    {
        return file_exists($this->fileName($id->value()))
            ? unserialize(file_get_contents($this->fileName($id->value())))
            : null;
    }

    private function fileName(string $id): string
    {
        return sprintf('%s.%s.repo', self::FILE_PATH, $id);
    }
}
