<?php

namespace Redbastie\Tailwire\Commands;

use Illuminate\Console\Command;
use Livewire\Commands\ComponentParser;

class ComponentCommand extends Command
{
    use ManagesFiles;

    protected $signature = 'tailwire:component {class} {--full}';

    public function handle()
    {
        $componentParser = new ComponentParser('App\\Components', resource_path('views'), $this->argument('class'));

        $this->createFiles('component' . ($this->option('full') ? '-full' : ''), [
            'app/Components' => str_replace(['App\\Components', '\\'], ['app/Components', '/'], $dummyNamespace),
            'DummyNamespace' => $dummyNamespace = $componentParser->classNamespace(),
            'DummyClass' => $componentParser->className(),
            'DummyRouteUri' => str_replace('.', '/', $componentParser->viewName()),
            'DummyRouteName' => $componentParser->viewName(),
            'DummyViewTitle' => preg_replace('/(.)(?=[A-Z])/u', '$1 ', $componentParser->className()),
            'DummyWisdomOfTheTao' => $componentParser->wisdomOfTheTao(),
        ]);

        $this->warn('<info>' . $this->argument('class') . '</info> component generated!');
    }
}
