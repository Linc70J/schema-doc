<?php

namespace Linc70j\SchemaDoc\Database\Types\Postgresql;

use Linc70j\SchemaDoc\Database\Types\Common\CharType;

class CharacterType extends CharType
{
    const NAME = 'character';
    const DBTYPE = 'bpchar';
}
