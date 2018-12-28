<?php

namespace Linc70j\SchemaDoc\Database\Types\Postgresql;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Linc70j\SchemaDoc\Database\Types\Type;

class JsonbType extends Type
{
    const NAME = 'jsonb';

    public function getSQLDeclaration(array $field, AbstractPlatform $platform)
    {
        return 'jsonb';
    }
}
