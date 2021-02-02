<?php

namespace Redbastie\Tailwire\Providers;

use Illuminate\Support\ServiceProvider;

class TailwireServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                \Redbastie\Tailwire\Commands\AuthCommand::class,
                \Redbastie\Tailwire\Commands\ComponentCommand::class,
                \Redbastie\Tailwire\Commands\CrudCommand::class,
                \Redbastie\Tailwire\Commands\InstallCommand::class,
                \Redbastie\Tailwire\Commands\MigrateCommand::class,
                \Redbastie\Tailwire\Commands\ModelCommand::class,
            ]);
        }

        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'tailwire');

        $this->publishes([
            __DIR__ . '/../../resources/views' => resource_path('views/vendor/tailwire'),
        ]);
    }
}
