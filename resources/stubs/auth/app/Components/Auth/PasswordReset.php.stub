<?php

namespace App\Components\Auth;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Redbastie\Tailwire\Component;
use Redbastie\Tailwire\View;

class PasswordReset extends Component
{
    public $routeUri = '/password-reset/{token}/{email}';
    public $routeName = 'password.reset';
    public $routeMiddleware = 'guest';
    public $viewTitle = 'Reset Password';
    public $viewExtends = 'layouts.app';

    public function mount($token, $email)
    {
        $this->model = [
            'token' => $token,
            'email' => $email,
        ];
    }

    public function view(View $v)
    {
        return $v->section(
            $v->h1($this->viewTitle)->class('text-xl px-6 py-4'),

            $v->form(
                $v->div(
                    $v->label('New Password')->for('password'),
                    $v->input()->type('password')->id('password')->wireModelDefer('password')
                        ->class(($this->error('password') ? 'border-red-500' : 'border-gray-300') . ' rounded-lg w-full'),
                    $v->if($this->error('password'), fn () => $v->p($this->error('password'))->class('text-xs text-red-600'))
                )->class('space-y-1'),

                $v->div(
                    $v->label('Confirm New Password')->for('password_confirmation'),
                    $v->input()->type('password')->id('password_confirmation')->wireModelDefer('password_confirmation')
                        ->class('border-gray-300 rounded-lg w-full'),
                )->class('space-y-1'),

                $v->button('Reset Password')->type('submit')->class('text-white bg-blue-600 rounded-lg w-full py-2')
            )->wireSubmitPrevent('resetPassword')->class('space-y-4 p-6')
        )->class('bg-white rounded-lg shadow divide-y md:w-1/3 mx-auto');
    }

    public function resetPassword()
    {
        $this->validate([
            'password' => ['required', 'confirmed'],
        ]);

        $response = Password::reset($this->model, function (User $user) {
            $user->update(['password' => $this->model('password')]);

            Auth::login($user, true);
        });

        if ($response != Password::PASSWORD_RESET) {
            $this->addError('password', trans($response));

            return;
        }

        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
