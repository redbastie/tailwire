<?php

namespace Redbastie\Tailwire\Elements;

class ContentlessElement extends BaseElement
{
    protected $tag;

    public function __construct($tag)
    {
        parent::__construct();

        $this->tag = $tag;
    }
}
