<?php

namespace App\Components\Auth;

use Illuminate\Support\Facades\Password;
use Redbastie\Tailwire\Component;
use Redbastie\Tailwire\View;

class PasswordForgot extends Component
{
    public $routeUri = '/password-forgot';
    public $routeName = 'password.forgot';
    public $routeMiddleware = 'guest';
    public $viewTitle = 'Forgot Password';
    public $viewExtends = 'layouts.app';
    public $sent;

    public function view(View $v)
    {
        return $v->section(
            $v->h1($this->viewTitle)->class('text-xl px-6 py-4'),

            $v->if(
                $this->sent,
                fn () => $v->p($this->sent)->class('text-green-600 p-6')
            )->else(
                fn () => $v->form(
                    $v->div(
                        $v->label('Email')->for('email'),
                        $v->input()->type('email')->id('email')->wireModelDefer('email')
                            ->class(($this->error('email') ? 'border-red-500' : 'border-gray-300') . ' rounded-lg w-full'),
                        $v->if($this->error('email'), fn () => $v->p($this->error('email'))->class('text-xs text-red-600'))
                    )->class('space-y-1'),

                    $v->button('Send Password Reset Link')->type('submit')->class('text-white bg-blue-600 rounded-lg w-full py-2')
                )->wireSubmitPrevent('sendPasswordResetLink')->class('space-y-4 p-6')
            )
        )->class('bg-white rounded-lg shadow divide-y md:w-1/3 mx-auto');
    }

    public function sendPasswordResetLink()
    {
        $validated = $this->validate([
            'email' => ['required', 'email'],
        ]);

        $response = Password::sendResetLink($validated);

        if ($response != Password::RESET_LINK_SENT) {
            $this->addError('email', trans($response));

            return;
        }

        $this->sent = trans($response);
    }
}
