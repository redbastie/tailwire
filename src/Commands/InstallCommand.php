<?php

namespace Redbastie\Tailwire\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class InstallCommand extends Command
{
    use ManagesFiles;

    protected $signature = 'tailwire:install';

    public function handle()
    {
        $this->createFiles('install', [
            'DummyAppName' => config('app.name'),
        ]);

        $this->deleteFiles([
            'database/migrations/2014_10_12_000000_create_users_table.php',
        ]);

        Artisan::call('tailwire:migrate', [], $this->getOutput());

        exec('npm install');
        exec('npm install tailwindcss@latest postcss@latest autoprefixer@latest @tailwindcss/forms -D');
        exec('npm run dev');

        $this->info('Installation complete! <href=' . config('app.url') . '>' . config('app.url') . '</>');
    }
}
