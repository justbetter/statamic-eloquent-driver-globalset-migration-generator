<?php

namespace JustBetter\StatamicEloquentDriverGlobalsetMigrationGenerator;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Event;
use Statamic\Events\GlobalSetCreated;
use Statamic\Providers\AddonServiceProvider;

class ServiceProvider extends AddonServiceProvider
{
    public function bootAddon()
    {
        Event::listen(function (GlobalSetCreated $event) {
            $globalSet = $event->globals;

            $filename = database_path(
                'migrations/'.date('Y_m_d_His').'_create_statamic_globalset_'.$globalSet->handle().'.php'
            );

            $content = str_replace(
                '{{ data }}',
                json_encode(Arr::except($globalSet->model()->getRawOriginal(), 'id')),
                file_get_contents(__DIR__.'/../stubs/migration.globalset.stub')
            );

            file_put_contents($filename, $content);

            $globalSet->model()->delete();

            Artisan::call('migrate');
        });

        return $this;
    }
}
