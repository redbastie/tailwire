<?php

namespace App\Components\Auth;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Redbastie\Tailwire\Component;
use Redbastie\Tailwire\View;

class Register extends Component
{
    public $routeUri = '/register';
    public $routeName = 'register';
    public $routeMiddleware = 'guest';
    public $viewTitle = 'Register';
    public $viewExtends = 'layouts.app';

    public function view(View $v)
    {
        return $v->section(
            $v->h1($this->viewTitle)->class('text-xl px-6 py-4'),

            $v->form(
                $v->div(
                    $v->label('Name')->for('name'),
                    $v->input()->id('name')->wireModelDefer('name')
                        ->class(($this->error('name') ? 'border-red-500' : 'border-gray-300') . ' rounded-lg w-full'),
                    $v->if($this->error('name'), fn () => $v->p($this->error('name'))->class('text-xs text-red-600'))
                )->class('space-y-1'),

                $v->div(
                    $v->label('Email')->for('email'),
                    $v->input()->type('email')->id('email')->wireModelDefer('email')
                        ->class(($this->error('email') ? 'border-red-500' : 'border-gray-300') . ' rounded-lg w-full'),
                    $v->if($this->error('email'), fn () => $v->p($this->error('email'))->class('text-xs text-red-600'))
                )->class('space-y-1'),

                $v->div(
                    $v->label('Password')->for('password'),
                    $v->input()->type('password')->id('password')->wireModelDefer('password')
                        ->class(($this->error('password') ? 'border-red-500' : 'border-gray-300') . ' rounded-lg w-full'),
                    $v->if($this->error('password'), fn () => $v->p($this->error('password'))->class('text-xs text-red-600'))
                )->class('space-y-1'),

                $v->div(
                    $v->label('Confirm Password')->for('password_confirmation'),
                    $v->input()->type('password')->id('password_confirmation')->wireModelDefer('password_confirmation')
                        ->class('border-gray-300 rounded-lg w-full'),
                )->class('space-y-1'),

                $v->honey(),

                $v->button('Register')->type('submit')->class('text-white bg-blue-600 rounded-lg w-full py-2')
            )->wireSubmitPrevent('register')->class('space-y-4 p-6')
        )->class('bg-white rounded-lg shadow divide-y md:w-1/3 mx-auto');
    }

    public function register()
    {
        $validated = $this->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'confirmed'],
        ]);

        $user = User::create($validated);

        Auth::login($user, true);

        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
