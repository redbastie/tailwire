<?php

namespace App\Components;

use Redbastie\Tailwire\Component;
use Redbastie\Tailwire\View;

class Index extends Component
{
    public $routeUri = '/';
    public $routeName = 'index';
    public $viewTitle = 'Index';
    public $viewExtends = 'layouts.app';

    public function view(View $v)
    {
        return $v->section(
            $v->h1($this->viewTitle)->class('text-xl px-6 py-4'),

            $v->p('Welcome to your Tailwire app!')->class('p-6')
        )->class('bg-white rounded-lg shadow divide-y md:w-1/3 mx-auto');
    }
}
