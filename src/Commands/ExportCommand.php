<?php


namespace Linc70j\SchemaDoc\Commands;

use Illuminate\Console\Command;
use Linc70j\SchemaDoc\Exports\SchemaExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'schema-doc:export {table} {path?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Export mysql schema to excel';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try {
            // 取得參數
            $table = $this->argument('table');
            $path = $this->argument('path');

            // 輸出Excel
            Excel::store(new SchemaExport($table), $path ?? date('Y_m_d_His').'_schema.xlsx', config('schemadoc.disk_name'));

            $this->info('Excel successfully created');
        } catch (\Exception $ex) {
            $this->error($ex->getMessage() . ' on line ' . $ex->getLine() . ' in ' . $ex->getFile());
        }
    }
}
