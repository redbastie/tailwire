<?php

namespace Redbastie\Tailwire\Commands;

use Illuminate\Console\Command;
use Livewire\Commands\ComponentParser;

class ComponentCommand extends Command
{
    use ManagesFiles;

    protected $signature = 'tailwire:component {class} {--full} {--modal}';

    public function handle()
    {
        $componentParser = new ComponentParser('App\\Components', resource_path('views'), $this->argument('class'));

        $stubFolder = 'component';
        if ($this->option('full')) $stubFolder .= '-full';
        else if ($this->option('modal')) $stubFolder .= '-modal';

        $this->createFiles($stubFolder, [
            'app/Components/DummyComponent.php.stub' => $componentParser->relativeClassPath(),
            'DummyComponentNamespace' => $componentParser->classNamespace(),
            'DummyComponent' => $componentParser->className(),
            'DummyRouteUri' => $dummyRouteUri = str_replace('.', '/', $componentParser->viewName()),
            'DummyRouteName' => $componentParser->viewName(),
            'DummyViewTitle' => preg_replace('/(.)(?=[A-Z])/u', '$1 ', $componentParser->className()),
            'DummyWisdomOfTheTao' => $componentParser->wisdomOfTheTao(),
        ]);

        $this->warn('<info>' . $this->argument('class') . '</info> component & view generated! ' .
            ($this->option('full') ? '<href=' . url($dummyRouteUri) . '>' . url($dummyRouteUri) . '</>' : ''));
    }
}
