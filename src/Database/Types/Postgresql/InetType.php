<?php

namespace Linc70j\SchemaDoc\Database\Types\Postgresql;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Linc70j\SchemaDoc\Database\Types\Type;

class InetType extends Type
{
    const NAME = 'inet';

    public function getSQLDeclaration(array $field, AbstractPlatform $platform)
    {
        return 'inet';
    }
}
