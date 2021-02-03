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
        $factoryParser = new ComponentParser('Database\\Factories', resource_path('views'), $this->argument('class') . 'Factory');

        $this->createFiles('model', [
            'app/Models/DummyModel.php.stub' => $modelParser->relativeClassPath(),
            'database/factories/DummyFactory.php.stub' => str_replace('app/Database/Factories', 'database/factories', $factoryParser->relativeClassPath()),
            'DummyModelNamespace' => $modelParser->classNamespace(),
            'DummyModel' => $modelParser->className(),
            'DummyFactoryNamespace' => $factoryParser->classNamespace(),
            'DummyFactory' => $factoryParser->className(),
        ]);

        $this->warn('<info>' . $this->argument('class') . '</info> model & factory generated!');
        $this->warn("Don't forget to <info>tailwire:migrate</info> after updating the new model.");
    }
}
