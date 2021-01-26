<?php

namespace Redbastie\Tailwire;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Livewire\LivewireManager;

class Component extends \Livewire\Component
{
    public $routeUri, $routeName, $routeMiddleware, $routeDomain, $routeWhere;
    public $viewTitle, $viewExtends;
    public $model = [];
    public $perPage = 15;
    protected $listeners = ['$refresh', 'infiniteScroll', 'recaptcha'];

    public function view(View $v)
    {
        return $v->p('Hello, world!');
    }

    public function render()
    {
        $view = new View;

        if ($this->viewExtends) {
            $component = app((new LivewireManager)->getClass($this->viewExtends));
            $view->yield = $this->view($view);
        } else {
            $component = $this;
        }

        return view('tailwire::component', ['view' => $component->view($view)]);
    }

    public function model($key)
    {
        return Arr::get($this->model, $key);
    }

    public function validate($rules = null, $messages = [], $attributes = [])
    {
        [$rules, $messages, $attributes] = $this->providedOrGlobalRulesMessagesAndAttributes($rules, $messages, $attributes);
        $validator = Validator::make($this->model, $rules, $messages, $attributes);

        if ($validator->fails()) {
            if (array_key_exists('recaptcha', $rules)) {
                $this->emit('resetRecaptcha');
            }

            throw new ValidationException($validator);
        }

        return $validator->validated();
    }

    public function error($key)
    {
        return $this->getErrorBag()->get($key)[0] ?? null;
    }

    public function bodyScrollLock()
    {
        $this->emit('bodyScrollLock');
    }

    public function bodyScrollUnlock()
    {
        $this->emit('bodyScrollUnlock');
    }

    public function infiniteScroll()
    {
        $this->perPage += 15;
        $this->emit('infiniteScrolled');
    }

    public function recaptcha($response)
    {
        $this->model['recaptcha'] = $response;
    }
}
