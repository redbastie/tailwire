<?php

namespace Redbastie\Tailwire\Directives;

class EachDirective
{
    private $items, $closure, $empty;

    public function __construct($items, $closure)
    {
        $this->items = $items;
        $this->closure = $closure;
    }

    public function empty($closure)
    {
        $this->empty = $closure;

        return $this;
    }

    public function __toString()
    {
        if (count($this->items) == 0) {
            $closure = $this->empty;

            return $closure ? $closure() : '';
        }

        $string = '';
        $closure = $this->closure;

        foreach ($this->items as $key => $item) {
            $string .= $closure($item, $key);
        }

        return $string;
    }
}
