<?php

namespace Linc70j\SchemaDoc\Database\Types\Postgresql;

use Linc70j\SchemaDoc\Database\Types\Common\VarCharType;

class CharacterVaryingType extends VarCharType
{
    const NAME = 'character varying';
    const DBTYPE = 'varchar';
}
