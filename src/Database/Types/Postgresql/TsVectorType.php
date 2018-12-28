<?php

namespace Linc70j\SchemaDoc\Database\Types\Postgresql;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Linc70j\SchemaDoc\Database\Types\Type;

class TsVectorType extends Type
{
    const NAME = 'tsvector';

    public function getSQLDeclaration(array $field, AbstractPlatform $platform)
    {
        return 'tsvector';
    }
}
