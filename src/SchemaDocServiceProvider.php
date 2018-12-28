<?php

namespace Linc70j\SchemaDoc;

use Illuminate\Support\ServiceProvider;
use Linc70j\SchemaDoc\Commands\ExportCommand;

class SchemaDocServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/schemadoc.php' => config_path('schemadoc.php'),
        ], 'config');
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/schemadoc.php', 'schemadoc');
        $this->app->bind('command.schema-doc:export', ExportCommand::class);
        $this->commands(['command.schema-doc:export']);

        if (! config('schemadoc.disk_name')) {
            config(['schemadoc.disk_name' => config('schemadoc.default_filesystem')]);
        }
    }
}
