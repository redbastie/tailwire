<?php

namespace Redbastie\Tailwire\Elements;

class ContentElement extends BaseElement
{
    protected $tag, $content;

    public function __construct($tag, ...$content)
    {
        parent::__construct();

        $this->tag = $tag;
        $this->content = implode($content);
    }
}
