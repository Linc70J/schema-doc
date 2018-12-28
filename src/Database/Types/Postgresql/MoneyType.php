<?php

namespace Linc70j\SchemaDoc\Database\Types\Postgresql;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Linc70j\SchemaDoc\Database\Types\Type;

class MoneyType extends Type
{
    const NAME = 'money';

    public function getSQLDeclaration(array $field, AbstractPlatform $platform)
    {
        return 'money';
    }
}
