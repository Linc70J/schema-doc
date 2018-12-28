<?php

namespace Linc70j\SchemaDoc\Database\Types\Common;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Linc70j\SchemaDoc\Database\Types\Type;

class TextType extends Type
{
    const NAME = 'text';

    public function getSQLDeclaration(array $field, AbstractPlatform $platform)
    {
        return 'text';
    }
}
