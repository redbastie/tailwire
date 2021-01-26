<?php

namespace Redbastie\Tailwire\Providers;

use Illuminate\Support\ServiceProvider;
use Redbastie\Tailwire\Commands\AuthCommand;
use Redbastie\Tailwire\Commands\ComponentCommand;
use Redbastie\Tailwire\Commands\CrudCommand;
use Redbastie\Tailwire\Commands\InstallCommand;
use Redbastie\Tailwire\Commands\MigrateCommand;
use Redbastie\Tailwire\Commands\ModelCommand;

class TailwireServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                AuthCommand::class,
                ComponentCommand::class,
                CrudCommand::class,
                InstallCommand::class,
                MigrateCommand::class,
                ModelCommand::class,
            ]);
        }

        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'tailwire');

        $this->publishes([
            __DIR__ . '/../../resources/views' => resource_path('views/vendor/tailwire'),
        ]);
    }
}
