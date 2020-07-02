<?php

declare(strict_types = 1);

namespace Gtto\Mooc\Users\Infrastructure\Persistence;

use Gtto\Mooc\Users\Domain\User;
use Gtto\Mooc\Users\Domain\UserRepository;
use Gtto\Mooc\Shared\Domain\UserId;

final class FileUserRepository implements UserRepository
{
    private const FILE_PATH = __DIR__ . '/Users';

    public function save(User $User): void
    {
        file_put_contents($this->fileName($User->id()->value()), serialize($User));
    }

    public function search(UserId $id): ?User
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
