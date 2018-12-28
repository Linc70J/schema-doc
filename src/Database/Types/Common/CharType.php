<?php

namespace Linc70j\SchemaDoc\Database\Types\Common;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Linc70j\SchemaDoc\Database\Types\Type;

class CharType extends Type
{
    const NAME = 'char';

    public function getSQLDeclaration(array $field, AbstractPlatform $platform)
    {
        $field['length'] = empty($field['length']) ? 1 : $field['length'];

        return "char({$field['length']})";
    }
}
