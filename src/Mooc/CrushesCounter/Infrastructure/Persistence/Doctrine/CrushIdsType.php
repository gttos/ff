<?php

declare(strict_types = 1);

namespace Gtto\Mooc\CrushesCounter\Infrastructure\Persistence\Doctrine;

use Gtto\Mooc\Shared\Domain\CrushId;
use Gtto\Shared\Infrastructure\Doctrine\Dbal\DoctrineCustomType;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\JsonType;
use function Lambdish\Phunctional\map;

final class CrushIdsType extends JsonType implements DoctrineCustomType
{
    public static function customTypeName(): string
    {
        return 'crush_ids';
    }

    public function getName(): string
    {
        return self::customTypeName();
    }

    /** @var CrushId[] $value */
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return parent::convertToDatabaseValue(map($this->values(), $value), $platform);
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        $scalars = parent::convertToPHPValue($value, $platform);

        return map($this->toCrushId(), $scalars);
    }

    private function values()
    {
        return static function (CrushId $id) {
            return $id->value();
        };
    }

    private function toCrushId()
    {
        return static function (string $value) {
            return new CrushId($value);
        };
    }
}
