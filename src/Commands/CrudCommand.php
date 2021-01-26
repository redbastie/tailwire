<?php

namespace Redbastie\Tailwire\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;
use Livewire\Commands\ComponentParser;

class CrudCommand extends Command
{
    use ManagesFiles;

    protected $signature = 'tailwire:crud {class}';

    public function handle()
    {
        Artisan::call('tailwire:model ' . $this->argument('class'), [], $this->getOutput());

        $componentParser = new ComponentParser('App\\Components', resource_path('views'), $this->argument('class'));
        $modelParser = new ComponentParser('App\\Models', resource_path('views'), $this->argument('class'));

        $this->createFiles('crud', [
            'DummyComponentNamespace' => $dummyComponentNamespace = $componentParser->classNamespace(),
            'DummyModelNamespace' => $modelParser->classNamespace(),
            'DummyClass' => $modelParser->className(),
            'DummyRouteUri' => $dummyRouteUri = str_replace('.', '/', $modelParser->viewName()),
            'DummyRouteName' => $modelParser->viewName(),
            'DummyTitles' => $dummyTitles = Str::plural(preg_replace('/(.)(?=[A-Z])/u', '$1 ', $componentParser->className())),
            'DummyTitle' => $dummyTitle = Str::singular($dummyTitles),
            'dummyVariable' => Str::camel($dummyTitle),
            'app/Components' => str_replace(['App\\Components', '\\'], ['app/Components', '/'], $dummyComponentNamespace),
        ]);

        $this->warn('<info>' . $this->argument('class') . '</info> crud generated! <href=' . url($dummyRouteUri) . '>' . url($dummyRouteUri) . '</>');
        $this->warn("Don't forget to <info>tailwire:migrate</info> after updating the new model.");
    }
}
