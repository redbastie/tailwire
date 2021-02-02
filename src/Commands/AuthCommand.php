<?php

namespace Redbastie\Tailwire\Commands;

use Illuminate\Console\Command;

class AuthCommand extends Command
{
    use ManagesFiles;

    protected $signature = 'tailwire:auth';

    public function handle()
    {
        $this->createFiles('auth');

        $this->info('Auth generated! <href=' . url('register') . '>' . url('login') . '</>');
    }
}
