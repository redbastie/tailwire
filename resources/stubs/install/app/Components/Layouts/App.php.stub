<?php

namespace App\Components\Layouts;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Redbastie\Tailwire\Component;
use Redbastie\Tailwire\View;

class App extends Component
{
    public function view(View $v)
    {
        return $v->body(
            $v->swipeDownRefresh(
                $v->icon('refresh')->class('animate-spin text-gray-400 w-5 h-5 mx-auto')
            )->class('mb-4'),

            $v->header(
                $v->a(
                    $v->img()->src(asset('images/icon-fav.png'))->class('w-5 h-5'),
                    $v->span(config('app.name'))->class('text-xl')
                )->href(route('index'))->class('flex items-center space-x-1.5'),

                $v->if(
                    Route::has('login'),
                    fn () => $v->if(
                        Auth::guest(),
                        fn () => $v->nav(
                            $v->a('Login')->href(route('login'))
                                ->class(Request::is('login') ? 'text-blue-600' : 'text-gray-500'),
                            $v->a('Register')->href(route('register'))
                                ->class(Request::is('register') ? 'text-blue-600' : 'text-gray-500'),
                        )->class('flex space-x-4')
                    )->else(
                        fn () => $v->nav(
                            $v->a('Home')->href(route('home'))
                                ->class(Request::is('home') ? 'text-blue-600' : 'text-gray-500'),
                            $v->a('Logout')->href(route('logout'))
                                ->class('text-gray-500'),
                        )->class('flex space-x-4')
                    )
                )
            )->class('flex items-center justify-between max-w-screen-lg mx-auto mb-4'),

            $v->main(
                $v->yield()
            )->class('max-w-screen-lg mx-auto mb-4'),
        )->class('bg-gray-100 m-4');
    }
}
