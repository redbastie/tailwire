<?php

namespace Redbastie\Tailwire\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;

class AuthCommand extends Command
{
    use ManagesFiles;

    protected $signature = 'tailwire:auth';

    public function handle()
    {
        $this->createFiles('auth');

        Artisan::call('tailwire:migrate', [], $this->getOutput());

        User::query()->updateOrCreate(
            ['email' => 'user@example.com'],
            ['name' => 'Example User', 'password' => Hash::make('password')]
        );

        $this->warn('User created: <info>user@example.com:password</info>');
        $this->info('Auth scaffolding complete! <href=' . url('login') . '>' . url('login') . '</>');
    }
}
