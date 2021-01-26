<?php

namespace Redbastie\Tailwire\Elements;

class IncludeElement
{
    protected $include, $data;

    public function __construct($include, $data)
    {
        $this->include = $include;
        $this->data = $data;
    }

    public function __toString()
    {
        return view('tailwire::elements.include', get_object_vars($this))->render();
    }
}
