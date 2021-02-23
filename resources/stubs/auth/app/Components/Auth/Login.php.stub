<?php

namespace App\Components\Auth;

use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Redbastie\Tailwire\Component;
use Redbastie\Tailwire\View;

class Login extends Component
{
    public $routeUri = '/login';
    public $routeName = 'login';
    public $routeMiddleware = 'guest';
    public $viewTitle = 'Login';
    public $viewExtends = 'layouts.app';

    public function view(View $v)
    {
        return $v->section(
            $v->h1($this->viewTitle)->class('text-xl px-6 py-4'),

            $v->form(
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
                    $v->div(
                        $v->input()->type('checkbox')->id('remember')->wireModelDefer('remember')
                            ->class('border-gray-300 rounded'),
                        $v->label('Remember')->for('remember')->class('pl-2')
                    )->class('flex items-center'),

                    $v->a('Forgot Password?')->href(route('password.forgot'))->class('text-blue-600')
                )->class('flex justify-between'),

                $v->button('Login')->type('submit')->class('text-white bg-blue-600 rounded-lg w-full py-2')
            )->wireSubmitPrevent('login')->class('space-y-4 p-6')
        )->class('bg-white rounded-lg shadow divide-y md:w-1/3 mx-auto');
    }

    public function login()
    {
        $validated = $this->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            $this->addError('email', trans('auth.throttle', [
                'seconds' => RateLimiter::availableIn($this->throttleKey()),
            ]));

            return;
        } else if (!Auth::attempt($validated, $this->model('remember'))) {
            RateLimiter::hit($this->throttleKey());

            $this->addError('email', trans('auth.failed'));

            return;
        }

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    public function throttleKey()
    {
        return $this->model('email') . '|' . request()->ip();
    }
}
