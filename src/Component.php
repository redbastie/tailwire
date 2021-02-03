<?php

namespace Redbastie\Tailwire;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use Livewire\LivewireManager;
use Lukeraymonddowning\Honey\Traits\WithHoney;

class Component extends \Livewire\Component
{
    use WithHoney;

    public $routeUri, $routeName, $routeMiddleware, $routeDomain, $routeWhere;
    public $viewTitle, $viewExtends;
    public $model = [];
    public $visible = false;
    public $perPage = 15;
    protected $listeners = ['$refresh', 'show', 'infiniteScroll'];

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
        }
        else {
            $component = $this;
        }

        return view('tailwire::component', ['view' => $component->view($view)])->layout('tailwire::layout');
    }

    public function model($key)
    {
        return Arr::get($this->model, $key);
    }

    public function validate($rules = null, $messages = [], $attributes = [])
    {
        [$rules, $messages, $attributes] = $this->providedOrGlobalRulesMessagesAndAttributes($rules, $messages, $attributes);
        $validator = Validator::make($this->model, $rules, $messages, $attributes);
        $validated = $validator->validate();

        $this->resetErrorBag();

        return $validated;
    }

    public function error($key)
    {
        return $this->getErrorBag()->get($key)[0] ?? null;
    }

    public function updatedModelSearch()
    {
        $this->perPage = 15;
    }

    public function infiniteScroll()
    {
        $this->perPage += 15;
    }

    public function toggleVisibility()
    {
        $this->visible = !$this->visible;

        $this->emit($this->visible ? 'bodyScrollLock' : 'bodyScrollUnlock');
    }
}
