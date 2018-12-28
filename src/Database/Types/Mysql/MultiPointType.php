<?php

namespace Linc70j\SchemaDoc\Database\Types\Mysql;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Linc70j\SchemaDoc\Database\Types\Type;

class MultiPointType extends Type
{
    const NAME = 'multipoint';

    public function getSQLDeclaration(array $field, AbstractPlatform $platform)
    {
        return 'multipoint';
    }
}
