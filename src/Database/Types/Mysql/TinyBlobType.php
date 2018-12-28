<?php

namespace Linc70j\SchemaDoc\Database\Types\Mysql;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Linc70j\SchemaDoc\Database\Types\Type;

class TinyBlobType extends Type
{
    const NAME = 'tinyblob';

    public function getSQLDeclaration(array $field, AbstractPlatform $platform)
    {
        return 'tinyblob';
    }
}
