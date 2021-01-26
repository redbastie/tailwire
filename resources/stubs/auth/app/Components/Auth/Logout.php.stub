<?php

namespace App\Components\Auth;

use Illuminate\Support\Facades\Auth;
use Redbastie\Tailwire\Component;

class Logout extends Component
{
    public $routeUri = '/logout';
    public $routeName = 'logout';
    public $routeMiddleware = 'auth';

    public function mount()
    {
        Auth::logout();

        return redirect()->to('/');
    }
}
