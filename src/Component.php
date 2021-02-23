<?php

namespace Redbastie\Tailwire;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use Livewire\LivewireManager;
use Livewire\WithFileUploads;
use Lukeraymonddowning\Honey\Traits\WithHoney;

class Component extends \Livewire\Component
{
    use WithFileUploads, WithHoney;

    public $routeUri, $routeName, $routeMiddleware, $routeDomain, $routeWhere;
    public $viewTitle, $viewExtends;
    public $model = [];
    public $perPage = 20;
    public $perPageIncrement = 20;
    public $show = false;
    protected $listeners = ['$refresh', 'infiniteScroll', 'show'];

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
        $this->perPage = $this->perPageIncrement;
    }

    public function infiniteScroll()
    {
        $this->perPage += $this->perPageIncrement;
    }

    public function toggleShow()
    {
        $this->show = !$this->show;

        $this->emit($this->show ? 'bodyScrollLock' : 'bodyScrollUnlock');
    }
}
