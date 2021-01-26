<?php

namespace Redbastie\Tailwire\Elements;

class RecaptchaElement
{
    protected $theme;

    public function __construct($theme)
    {
        $this->theme = $theme;
    }

    public function __toString()
    {
        return view('tailwire::elements.recaptcha', get_object_vars($this))->render();
    }
}
