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
        if ($this->argument('class') == 'User') {
            $this->createFiles('crud-user');

            $this->warn('<info>User</info> CRUD components & views generated! ' . '<href=' . url('users') . '>' . url('users') . '</>');
        }
        else {
            $modelParser = new ComponentParser('App\\Models', resource_path('views'), $this->argument('class'));
            $modelTitles = Str::plural(preg_replace('/(.)(?=[A-Z])/u', '$1 ', $modelParser->className()));
            $componentClass = Str::replaceLast($modelParser->className(), Str::studly($modelTitles), $this->argument('class'));
            $componentParser = new ComponentParser('App\\Components', resource_path('views'), $componentClass);

            $this->createFiles('crud', [
                'app/Components/DummyModels' => str_replace('.php', '', $componentParser->relativeClassPath()),
                'resources/views/DummyViews' => str_replace('.blade.php', '', $componentParser->relativeViewPath()),
                'DummyComponentNamespace' => $componentParser->classNamespace() . '\\' . $componentParser->className(),
                'DummyModelNamespace' => $modelParser->classNamespace(),
                'DummyModelVariables' => Str::camel($modelTitles),
                'DummyModelVariable' => Str::camel(Str::singular($modelTitles)),
                'DummyModelTitles' => $modelTitles,
                'DummyModelTitle' => Str::singular($modelTitles),
                'DummyModel' => $modelParser->className(),
                'DummyRouteUri' => $dummyRouteUri = str_replace('.', '/', $componentParser->viewName()),
                'DummyViewName' => $componentParser->viewName(),
            ]);

            $this->warn('<info>' . $this->argument('class') . '</info> CRUD components & views generated! ' .
                '<href=' . url($dummyRouteUri) . '>' . url($dummyRouteUri) . '</>');

            if (!$this->fileExists($modelParser->relativeClassPath())) {
                Artisan::call('skele:model ' . $this->argument('class'), [], $this->getOutput());
            }
        }


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

        $this->warn('<info>' . $this->argument('class') . '</info> CRUD generated! <href=' . url($dummyRouteUri) . '>' . url($dummyRouteUri) . '</>');

        if (!$this->fileExists($modelParser->relativeClassPath())) {
            Artisan::call('skele:model ' . $this->argument('class'), [], $this->getOutput());
        }
    }
}
