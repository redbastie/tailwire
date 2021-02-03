<?php

namespace Redbastie\Tailwire\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Livewire\Commands\ComponentParser;

class ComponentCommand extends Command
{
    use ManagesFiles;

    protected $signature = 'tailwire:component {class} {--full} {--modal} {--list} {--model=}';

    public function handle()
    {
        if ($this->option('list') && !$this->option('model')) {
            $this->warn('A <info>--model</info> must be specified for the list!');

            return;
        }

        $componentParser = new ComponentParser('App\\Components', resource_path('views'), $this->argument('class'));
        $modelParser = new ComponentParser('App\\Models', resource_path('views'), $this->option('model'));

        $stubFolder = 'component';
        if ($this->option('full')) $stubFolder .= '-full';
        else if ($this->option('modal')) $stubFolder .= '-modal';
        else if ($this->option('list')) $stubFolder .= '-list';

        $this->createFiles($stubFolder, [
            'app/Components/DummyComponent.php.stub' => $componentParser->relativeClassPath(),
            'DummyComponentNamespace' => $componentParser->classNamespace(),
            'DummyComponent' => $componentParser->className(),
            'DummyModelNamespace' => $modelParser->classNamespace(),
            'DummyModelVariables' => Str::camel(Str::plural($modelTitle = preg_replace('/(.)(?=[A-Z])/u', '$1 ', $modelParser->className()))),
            'DummyModelVariable' => Str::camel($modelTitle),
            'DummyModelTitles' => Str::plural($modelTitle),
            'DummyModel' => $modelParser->className(),
            'DummyRouteUri' => $dummyRouteUri = str_replace('.', '/', $componentParser->viewName()),
            'DummyRouteName' => $componentParser->viewName(),
            'DummyViewTitle' => preg_replace('/(.)(?=[A-Z])/u', '$1 ', $componentParser->className()),
            'DummyWisdomOfTheTao' => $componentParser->wisdomOfTheTao(),
        ]);

        $this->warn('<info>' . $this->argument('class') . '</info> component & view generated! ' .
            ($this->option('full') || $this->option('list') ? '<href=' . url($dummyRouteUri) . '>' . url($dummyRouteUri) . '</>' : ''));
    }
}
