<?php

namespace Redbastie\Tailwire\Elements;

class HoneyElement
{
    protected $recaptcha;

    public function __construct($recaptcha)
    {
        $this->recaptcha = $recaptcha;
    }

    public function __toString()
    {
        return view('tailwire::elements.honey' . ($this->recaptcha ? '-recaptcha' : ''), get_object_vars($this))->render();
    }
}
