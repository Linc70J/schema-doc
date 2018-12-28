<?php

namespace Linc70j\SchemaDoc\Database\Types\Mysql;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Linc70j\SchemaDoc\Database\Types\Type;

class MultiPolygonType extends Type
{
    const NAME = 'multipolygon';

    public function getSQLDeclaration(array $field, AbstractPlatform $platform)
    {
        return 'multipolygon';
    }
}
