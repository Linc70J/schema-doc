<?php
/**
 * Created by PhpStorm.
 * User: linc
 * Date: 2018/12/28
 * Time: 9:07 PM
 */

namespace Linc70j\SchemaDoc\Exports;


use Linc70j\SchemaDoc\Database\Schema\SchemaManager;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeSheet;

class SchemaTableSheet implements FromCollection, WithTitle, WithHeadings, WithMapping, WithEvents
{
    private $table;

    /**
     * SchemaTableSheet constructor.
     * @param string $table
     */
    public function __construct(string $table)
    {
        $this->table = SchemaManager::listTableDetails($table);
    }


    /**
     * Get table columns.
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return collect($this->table->toArray()['columns']);
    }

    /**
     * Set sheet title.
     * @return string
     */
    public function title(): string
    {
        return $this->table->getName();
    }

    /**
     * Set sheet header.
     * @return array
     */
    public function headings(): array
    {
        return [
            '名稱',
            '類型',
            '長度',
            '不是 NULL',
            '無符號',
            '預設值',
            'Auto',
            '說明',
        ];
    }

    /**
     * Set sheet row.
     * @param mixed $columns
     * @return array
     */
    public function map($columns): array
    {
        return [
            $columns['name'],
            $columns['type']['name'],
            $columns['length'],
            $columns['notnull'] ? 'TRUE':'FALSE',
            $columns['unsigned'] ? 'TRUE':'FALSE',
            $columns['default'],
            $columns['autoincrement'] ? 'TRUE':'FALSE',
            $columns['comment']
        ];
    }

    /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            BeforeSheet::class => function (BeforeSheet $event) {
                // 設定字體與字體大小
                $event->sheet->getDelegate()->getStyle('A:H')->getFont()->setSize(14)->setName('微軟正黑體');
                // 設定寬度
                $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(30);
                $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(13);
                $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(13);
                $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(13);
                $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(13);
                $event->sheet->getDelegate()->getColumnDimension('F')->setWidth(13);
                $event->sheet->getDelegate()->getColumnDimension('G')->setWidth(13);
                $event->sheet->getDelegate()->getColumnDimension('H')->setWidth(60);
            },
            AfterSheet::class => function (AfterSheet $event) {
                // 設定Header
                $event->sheet->getDelegate()->getStyle('A1:H1')->getFont()->setBold(true);
            },
        ];
    }
}