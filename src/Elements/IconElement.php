<?php

namespace Redbastie\Tailwire\Elements;

class IconElement extends BaseElement
{
    protected $icon;

    public function __construct($icon)
    {
        parent::__construct();

        $this->icon = $icon;
    }
}
