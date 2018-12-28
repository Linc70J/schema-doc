<?php
/**
 * Created by PhpStorm.
 * User: linc
 * Date: 2018/12/28
 * Time: 9:03 PM
 */

namespace Linc70j\SchemaDoc\Exports;


use Linc70j\SchemaDoc\Database\Schema\SchemaManager;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class SchemaExport implements WithMultipleSheets
{
    use Exportable;

    private $tables;

    /**
     * SchemaExport constructor.
     * @param array|null|string $tables
     */
    public function __construct($tables)
    {
        $this->tables = $tables;
    }

    /**
     * @return array
     */
    public function sheets(): array
    {
        $sheets = [];

        if ($this->tables == 'all') {
            // 輸出全部Schema
            $listTables = SchemaManager::listTables();
            foreach ($listTables as $table) {
                $sheets[] = new SchemaTableSheet($table->getName());
            }
        } else {
            if (strripos($this->tables, ",")) {
                // 輸出部分Schema
                $tables = explode(",", $this->tables);
                foreach ($tables as $table) {
                    $sheets[] = new SchemaTableSheet($table);
                }
            } else {
                // 輸出Schema
                $sheets[] = new SchemaTableSheet($this->tables);
            }
        }
        return $sheets;
    }
}