<?php

namespace Redbastie\Tailwire\Commands;

use Illuminate\Console\Command;
use Livewire\Commands\ComponentParser;

class ModelCommand extends Command
{
    use ManagesFiles;

    protected $signature = 'tailwire:model {class}';

    public function handle()
    {
        $modelParser = new ComponentParser('App\\Models', resource_path('views'), $this->argument('class'));
        $factoryParser = new ComponentParser('Database\\Factories', resource_path('views'), $this->argument('class'));

        $this->createFiles('model', [
            'DummyModelNamespace' => $dummyModelNamespace = $modelParser->classNamespace(),
            'DummyFactoryNamespace' => $dummyFactoryNamespace = $factoryParser->classNamespace(),
            'DummyClass' => $modelParser->className(),
            'app/Models' => str_replace(['App\\Models', '\\'], ['app/Models', '/'], $dummyModelNamespace),
            'database/factories' => str_replace(['Database\\Factories', '\\'], ['database/factories', '/'], $dummyFactoryNamespace),
        ]);

        $this->warn('<info>' . $this->argument('class') . '</info> model and factory generated!');
    }
}
