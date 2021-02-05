<?php

namespace App\Components;

use Redbastie\Tailwire\Component;
use Redbastie\Tailwire\View;

class Home extends Component
{
    public $routeUri = '/home';
    public $routeName = 'home';
    public $routeMiddleware = 'auth';
    public $viewTitle = 'Home';
    public $viewExtends = 'layouts.app';

    public function view(View $v)
    {
        return $v->section(
            $v->h1($this->viewTitle)->class('text-xl px-6 py-4'),

            $v->p('You are logged in!')->class('p-6')
        )->class('bg-white rounded-lg shadow divide-y md:w-1/3 mx-auto');
    }
}
