<?php

namespace Redbastie\Tailwire\Elements;

class HiddenElement extends BaseElement
{
    protected $content;

    public function __construct(...$content)
    {
        parent::__construct();

        $this->content = implode($content);
    }
}
