<?php

namespace Linc70j\SchemaDoc\Database\Types\Postgresql;

use Linc70j\SchemaDoc\Database\Types\Common\DoubleType;

class DoublePrecisionType extends DoubleType
{
    const NAME = 'double precision';
    const DBTYPE = 'float8';
}
