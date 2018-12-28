<?php

namespace Linc70j\SchemaDoc\Database\Types\Mysql;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Linc70j\SchemaDoc\Database\Types\Type;

class LongBlobType extends Type
{
    const NAME = 'longblob';

    public function getSQLDeclaration(array $field, AbstractPlatform $platform)
    {
        return 'longblob';
    }
}
