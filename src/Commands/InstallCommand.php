<?php

namespace Redbastie\Tailwire\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    use ManagesFiles;

    protected $signature = 'tailwire:install';

    public function handle()
    {
        $this->createFiles('install', [
            'DummyAppName' => config('app.name'),
        ]);

        $this->deleteFile('database/migrations/2014_10_12_000000_create_users_table.php');

        exec('npm install');
        exec('npm install tailwindcss@latest postcss@latest autoprefixer@latest @tailwindcss/forms -D');
        exec('npm run dev');

        $this->info('Installation complete! <href=' . config('app.url') . '>' . config('app.url') . '</>');
    }
}
