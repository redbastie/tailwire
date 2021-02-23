<?php

namespace Redbastie\Tailwire\Commands;

use Doctrine\DBAL\Schema\Comparator;
use Illuminate\Console\Command;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;

class MigrateCommand extends Command
{
    protected $signature = 'tailwire:migrate {--fresh} {--seed} {--force}';

    public function handle()
    {
        if (config('app.env') == 'production' && !$this->option('force')) {
            $this->warn('You must use the <info>--force</info> to migrate in production!');

            return;
        }

        $migrateCommand = 'migrate';
        if ($this->option('fresh')) $migrateCommand .= ':fresh';
        if ($this->option('force')) $migrateCommand .= ' --force';

        Artisan::call($migrateCommand);

        $filesystem = new Filesystem;

        if ($filesystem->exists($dir = app_path('Models'))) {
            foreach ($filesystem->allFiles($dir) as $file) {
                $class = app('App\\Models\\' . str_replace(['/', '.php'], ['\\', ''], $file->getRelativePathname()));

                if (method_exists($class, 'migration')) {
                    if (Schema::hasTable($class->getTable())) {
                        $tempTable = 'temp_' . $class->getTable();

                        Schema::dropIfExists($tempTable);
                        Schema::create($tempTable, function (Blueprint $table) use ($class) {
                            $class->migration($table);
                        });

                        $schemaManager = $class->getConnection()->getDoctrineSchemaManager();
                        $classTableDetails = $schemaManager->listTableDetails($class->getTable());
                        $tempTableDetails = $schemaManager->listTableDetails($tempTable);
                        $tableDiff = (new Comparator)->diffTable($classTableDetails, $tempTableDetails);

                        if ($tableDiff) {
                            $schemaManager->alterTable($tableDiff);
                        }

                        Schema::drop($tempTable);
                    } else {
                        Schema::create($class->getTable(), function (Blueprint $table) use ($class) {
                            $class->migration($table);
                        });
                    }
                }
            }
        }

        $this->info('Migration complete!');

        if ($this->option('seed')) {
            $seedCommand = 'db:seed';
            if ($this->option('force')) $seedCommand .= ' --force';

            Artisan::call($seedCommand);

            $this->info('Seeding complete!');
        }
    }
}
