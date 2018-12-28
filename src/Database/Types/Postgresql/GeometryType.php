<?php

namespace Linc70j\SchemaDoc\Database\Types\Postgresql;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Linc70j\SchemaDoc\Database\Types\Type;

class GeometryType extends Type
{
    const NAME = 'geometry';

    public function getSQLDeclaration(array $field, AbstractPlatform $platform)
    {
        return 'geometry';
    }
}
