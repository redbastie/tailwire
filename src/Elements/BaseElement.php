<?php

namespace Redbastie\Tailwire\Elements;

use Illuminate\Support\Str;
use Illuminate\View\ComponentAttributeBag;

class BaseElement
{
    protected $attributes;

    public function __construct()
    {
        $this->attributes = new ComponentAttributeBag;
    }

    public function __toString()
    {
        $view = Str::snake(Str::replaceLast('Element', '', class_basename($this)), '-');

        return view("tailwire::elements.$view", get_object_vars($this))->render();
    }

    public function attribute($key, $value = null)
    {
        $this->attributes[$key] = $value ?? '';

        return $this;
    }

    /*
     * Global HTML Attributes
     */

    public function accesskey($value)
    {
        return $this->attribute(__FUNCTION__, $value);
    }

    public function class($value)
    {
        return $this->attribute(__FUNCTION__, $value);
    }

    public function contenteditable($value = true)
    {
        return $value ? $this->attribute(__FUNCTION__, 'true') : $this;
    }

    public function dir($value)
    {
        return $this->attribute(__FUNCTION__, $value);
    }

    public function draggable($value = true)
    {
        return $value ? $this->attribute(__FUNCTION__, 'true') : $this;
    }

    public function id($value)
    {
        return $this->attribute(__FUNCTION__, $value);
    }

    public function lang($value)
    {
        return $this->attribute(__FUNCTION__, $value);
    }

    public function spellcheck($value = true)
    {
        return $value ? $this->attribute(__FUNCTION__, 'true') : $this;
    }

    public function tabindex($value)
    {
        return $this->attribute(__FUNCTION__, $value);
    }

    public function title($value)
    {
        return $this->attribute(__FUNCTION__, $value);
    }

    public function translate($value)
    {
        return $this->attribute(__FUNCTION__, $value);
    }

    /*
     * Other HTML Attributes
     */

    public function accept($value)
    {
        return $this->attribute(__FUNCTION__, $value);
    }

    public function acceptCharset($value)
    {
        return $this->attribute('accept-charset', $value);
    }

    public function action($value)
    {
        return $this->attribute(__FUNCTION__, $value);
    }

    public function alt($value)
    {
        return $this->attribute(__FUNCTION__, $value);
    }

    public function autocomplete($value)
    {
        return $this->attribute(__FUNCTION__, $value);
    }

    public function autofocus($value = true)
    {
        return $value ? $this->attribute(__FUNCTION__) : $this;
    }

    public function autoplay($value = true)
    {
        return $value ? $this->attribute(__FUNCTION__) : $this;
    }

    public function checked($value = true)
    {
        return $value ? $this->attribute(__FUNCTION__) : $this;
    }

    public function cite($value)
    {
        return $this->attribute(__FUNCTION__, $value);
    }

    public function cols($value)
    {
        return $this->attribute(__FUNCTION__, $value);
    }

    public function colspan($value)
    {
        return $this->attribute(__FUNCTION__, $value);
    }

    public function controls($value = true)
    {
        return $value ? $this->attribute(__FUNCTION__) : $this;
    }

    public function coords($value)
    {
        return $this->attribute(__FUNCTION__, $value);
    }

    public function data($value)
    {
        return $this->attribute(__FUNCTION__, $value);
    }

    public function datetime($value)
    {
        return $this->attribute(__FUNCTION__, $value);
    }

    public function default($value = true)
    {
        return $value ? $this->attribute(__FUNCTION__) : $this;
    }

    public function dirname($value)
    {
        return $this->attribute(__FUNCTION__, $value);
    }

    public function disabled($value = true)
    {
        return $value ? $this->attribute(__FUNCTION__) : $this;
    }

    public function download($value = true)
    {
        return $value ? $this->attribute(__FUNCTION__) : $this;
    }

    public function enctype($value)
    {
        return $this->attribute(__FUNCTION__, $value);
    }

    public function for($value)
    {
        return $this->attribute(__FUNCTION__, $value);
    }

    public function form($value)
    {
        return $this->attribute(__FUNCTION__, $value);
    }

    public function formaction($value)
    {
        return $this->attribute(__FUNCTION__, $value);
    }

    public function headers($value)
    {
        return $this->attribute(__FUNCTION__, $value);
    }

    public function height($value)
    {
        return $this->attribute(__FUNCTION__, $value);
    }

    public function high($value)
    {
        return $this->attribute(__FUNCTION__, $value);
    }

    public function href($value)
    {
        return $this->attribute(__FUNCTION__, $value);
    }

    public function hreflang($value)
    {
        return $this->attribute(__FUNCTION__, $value);
    }

    public function ismap($value = true)
    {
        return $value ? $this->attribute(__FUNCTION__) : $this;
    }

    public function kind($value)
    {
        return $this->attribute(__FUNCTION__, $value);
    }

    public function label($value)
    {
        return $this->attribute(__FUNCTION__, $value);
    }

    public function list($value)
    {
        return $this->attribute(__FUNCTION__, $value);
    }

    public function loop($value = true)
    {
        return $value ? $this->attribute(__FUNCTION__) : $this;
    }

    public function low($value)
    {
        return $this->attribute(__FUNCTION__, $value);
    }

    public function max($value)
    {
        return $this->attribute(__FUNCTION__, $value);
    }

    public function maxlength($value)
    {
        return $this->attribute(__FUNCTION__, $value);
    }

    public function media($value)
    {
        return $this->attribute(__FUNCTION__, $value);
    }

    public function method($value)
    {
        return $this->attribute(__FUNCTION__, $value);
    }

    public function min($value)
    {
        return $this->attribute(__FUNCTION__, $value);
    }

    public function multiple($value = true)
    {
        return $value ? $this->attribute(__FUNCTION__) : $this;
    }

    public function muted($value = true)
    {
        return $value ? $this->attribute(__FUNCTION__) : $this;
    }

    public function name($value)
    {
        return $this->attribute(__FUNCTION__, $value);
    }

    public function novalidate($value = true)
    {
        return $value ? $this->attribute(__FUNCTION__) : $this;
    }

    public function open($value = true)
    {
        return $value ? $this->attribute(__FUNCTION__) : $this;
    }

    public function optimum($value)
    {
        return $this->attribute(__FUNCTION__, $value);
    }

    public function pattern($value)
    {
        return $this->attribute(__FUNCTION__, $value);
    }

    public function placeholder($value)
    {
        return $this->attribute(__FUNCTION__, $value);
    }

    public function poster($value)
    {
        return $this->attribute(__FUNCTION__, $value);
    }

    public function preload($value)
    {
        return $this->attribute(__FUNCTION__, $value);
    }

    public function readonly($value = true)
    {
        return $value ? $this->attribute(__FUNCTION__) : $this;
    }

    public function rel($value)
    {
        return $this->attribute(__FUNCTION__, $value);
    }

    public function required($value = true)
    {
        return $value ? $this->attribute(__FUNCTION__) : $this;
    }

    public function reversed($value = true)
    {
        return $value ? $this->attribute(__FUNCTION__) : $this;
    }

    public function rows($value)
    {
        return $this->attribute(__FUNCTION__, $value);
    }

    public function rowspan($value)
    {
        return $this->attribute(__FUNCTION__, $value);
    }

    public function sandbox($value = true)
    {
        return $value ? $this->attribute(__FUNCTION__) : $this;
    }

    public function scope($value)
    {
        return $this->attribute(__FUNCTION__, $value);
    }

    public function selected($value = true)
    {
        return $value ? $this->attribute(__FUNCTION__) : $this;
    }

    public function shape($value)
    {
        return $this->attribute(__FUNCTION__, $value);
    }

    public function size($value)
    {
        return $this->attribute(__FUNCTION__, $value);
    }

    public function sizes($value)
    {
        return $this->attribute(__FUNCTION__, $value);
    }

    public function span($value)
    {
        return $this->attribute(__FUNCTION__, $value);
    }

    public function src($value)
    {
        return $this->attribute(__FUNCTION__, $value);
    }

    public function srcdoc($value)
    {
        return $this->attribute(__FUNCTION__, $value);
    }

    public function srclang($value)
    {
        return $this->attribute(__FUNCTION__, $value);
    }

    public function srcset($value)
    {
        return $this->attribute(__FUNCTION__, $value);
    }

    public function start($value)
    {
        return $this->attribute(__FUNCTION__, $value);
    }

    public function step($value)
    {
        return $this->attribute(__FUNCTION__, $value);
    }

    public function target($value)
    {
        return $this->attribute(__FUNCTION__, $value);
    }

    public function type($value)
    {
        return $this->attribute(__FUNCTION__, $value);
    }

    public function usemap($value)
    {
        return $this->attribute(__FUNCTION__, $value);
    }

    public function value($value)
    {
        return $this->attribute(__FUNCTION__, $value);
    }

    public function width($value)
    {
        return $this->attribute(__FUNCTION__, $value);
    }

    public function wrap($value)
    {
        return $this->attribute(__FUNCTION__, $value);
    }

    /*
     * Livewire / Other Actions
     */

    public function wireModel($value)
    {
        return $this->attribute('wire:model', "model.$value");
    }

    public function wireModelDebounce($value, $ms = 500)
    {
        return $this->attribute("wire:model.debounce.{$ms}ms", "model.$value");
    }

    public function wireModelDefer($value)
    {
        return $this->attribute('wire:model.defer', "model.$value");
    }

    public function wireModelLazy($value)
    {
        return $this->attribute('wire:model.lazy', "model.$value");
    }

    public function wireIgnore()
    {
        return $this->attribute('wire:ignore');
    }

    public function wireIgnoreSelf()
    {
        return $this->attribute('wire:ignore.self');
    }

    public function wireDirty()
    {
        return $this->attribute('wire:dirty');
    }

    public function wireDirtyClass($value)
    {
        return $this->attribute('wire:dirty.class', $value);
    }

    public function wireDirtyClassRemove($value)
    {
        return $this->attribute('wire:dirty.class.remove', $value);
    }

    public function wireLoading()
    {
        return $this->attribute('wire:loading');
    }

    public function wireLoadingBlock()
    {
        return $this->attribute('wire:loading.block');
    }

    public function wireLoadingFlex()
    {
        return $this->attribute('wire:loading.flex');
    }

    public function wireLoadingGrid()
    {
        return $this->attribute('wire:loading.grid');
    }

    public function wireLoadingInline()
    {
        return $this->attribute('wire:loading.inline');
    }

    public function wireLoadingTable()
    {
        return $this->attribute('wire:loading.table');
    }

    public function wireLoadingDelay()
    {
        return $this->attribute('wire:loading.delay');
    }

    public function wireLoadingRemove()
    {
        return $this->attribute('wire:loading.remove');
    }

    public function wireLoadingClass($value)
    {
        return $this->attribute('wire:loading.class', $value);
    }

    public function wireLoadingClassRemove($value)
    {
        return $this->attribute('wire:loading.class.remove', $value);
    }

    public function wireLoadingAttr($value)
    {
        return $this->attribute('wire:loading.attr', $value);
    }

    public function wireLoadingAttrRemove($value)
    {
        return $this->attribute('wire:loading.attr.remove', $value);
    }

    public function wireOffline()
    {
        return $this->attribute('wire:offline');
    }

    public function wireOfflineClass($value)
    {
        return $this->attribute('wire:offline.class', $value);
    }

    public function wireOfflineClassRemove($value)
    {
        return $this->attribute('wire:offline.class.remove', $value);
    }

    public function wireOfflineAttr($value)
    {
        return $this->attribute('wire:offline.attr', $value);
    }

    public function wireOfflineAttrRemove($value)
    {
        return $this->attribute('wire:offline.attr.remove', $value);
    }

    public function wireTarget($value)
    {
        return $this->attribute('wire:target', $value);
    }

    private function wireActionHandler($attribute, $action, ...$params)
    {
        if ($params) {
            $paramString = implode(', ', array_map(function ($param) {
                return "'" . addcslashes($param, "'") . "'";
            }, $params));

            $action = "$action($paramString)";
        }

        return $this->attribute($attribute, $action);
    }

    public function wireClick($action, ...$params)
    {
        return $this->wireActionHandler('wire:click', $action, ...$params);
    }

    public function wireClickPrefetch($action, ...$params)
    {
        return $this->wireActionHandler('wire:click.prefetch', $action, ...$params);
    }

    public function wireClickPrevent($action, ...$params)
    {
        return $this->wireActionHandler('wire:click.prevent', $action, ...$params);
    }

    public function wireClickSelf($action, ...$params)
    {
        return $this->wireActionHandler('wire:click.self', $action, ...$params);
    }

    public function wireClickStop($action, ...$params)
    {
        return $this->wireActionHandler('wire:click.stop', $action, ...$params);
    }

    public function wireSubmit($action, ...$params)
    {
        return $this->wireActionHandler('wire:submit', $action, ...$params);
    }

    public function wireSubmitPrevent($action, ...$params)
    {
        return $this->wireActionHandler('wire:submit.prevent', $action, ...$params);
    }

    public function wireSubmitSelf($action, ...$params)
    {
        return $this->wireActionHandler('wire:submit.self', $action, ...$params);
    }

    public function wireSubmitStop($action, ...$params)
    {
        return $this->wireActionHandler('wire:submit.stop', $action, ...$params);
    }

    public function wireKeydown($key, $action, ...$params)
    {
        return $this->wireActionHandler("wire:keydown.$key", $action, ...$params);
    }

    public function wirePoll($ms = 2000, $action = null, ...$params)
    {
        return $this->wireActionHandler("wire:poll.{$ms}ms", $action, ...$params);
    }

    public function wireInit($action, ...$params)
    {
        return $this->wireActionHandler('wire:init', $action, ...$params);
    }

    public function confirm($message)
    {
        return $this->attribute('onclick', "confirm('" . addcslashes($message, "'") . "') || event.stopImmediatePropagation()");
    }
}
