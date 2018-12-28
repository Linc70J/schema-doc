<?php

namespace Linc70j\SchemaDoc\Database\Types\Mysql;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Linc70j\SchemaDoc\Database\Types\Type;

class TinyTextType extends Type
{
    const NAME = 'tinytext';

    public function getSQLDeclaration(array $field, AbstractPlatform $platform)
    {
        return 'tinytext';
    }
}
