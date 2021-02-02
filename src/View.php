<?php

namespace Redbastie\Tailwire;

use Redbastie\Tailwire\Directives\EachDirective;
use Redbastie\Tailwire\Directives\IfDirective;
use Redbastie\Tailwire\Elements\ContentElement;
use Redbastie\Tailwire\Elements\ContentlessElement;
use Redbastie\Tailwire\Elements\HiddenElement;
use Redbastie\Tailwire\Elements\IconElement;
use Redbastie\Tailwire\Elements\IncludeElement;

class View
{
    public $yield;

    private function contentElement($tag, ...$content)
    {
        return new ContentElement($tag, ...$content);
    }

    private function contentlessElement($tag)
    {
        return new ContentlessElement($tag);
    }

    private function hiddenElement(...$content)
    {
        return new HiddenElement(...$content);
    }

    /*
     * Basic HTML
     */

    public function body(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function h1(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function h2(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function h3(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function h4(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function h5(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function h6(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function p(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function br()
    {
        return $this->contentlessElement(__FUNCTION__);
    }

    public function hr()
    {
        return $this->contentlessElement(__FUNCTION__);
    }

    /*
     * Formatting
     */

    public function abbr(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function address(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function b(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function bdi(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function bdo(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function blockquote(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function cite(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function code(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function del(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function dfn(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function em(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function i(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function ins(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function kbd(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function mark(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function meter(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function pre(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function progress(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function q(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function rp(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function rt(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function ruby(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function s(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function samp(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function small(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function strong(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function sub(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function sup(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function template(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function time(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function u(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function var(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function wbr(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    /*
     * Forms and Input
     */

    public function form(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function input()
    {
        return $this->contentlessElement(__FUNCTION__)->type('text');
    }

    public function textarea(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function button(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content)->type('button');
    }

    public function select(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function optgroup(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function option(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function label(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function fieldset(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function legend(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function datalist(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function output(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    /*
     * Frames
     */

    public function iframe(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    /*
     * Images
     */

    public function img()
    {
        return $this->contentlessElement(__FUNCTION__);
    }

    public function map(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function area()
    {
        return $this->contentlessElement(__FUNCTION__);
    }

    public function canvas(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function figcaption(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function figure(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function picture(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function svg(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    /*
     * Audio / Video
     */

    public function audio(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function source()
    {
        return $this->contentlessElement(__FUNCTION__);
    }

    public function track()
    {
        return $this->contentlessElement(__FUNCTION__);
    }

    public function video(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    /*
     * Links
     */

    public function a(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function nav(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    /*
     * Lists
     */

    public function ul(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function ol(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function li(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function dl(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function dt(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function dd(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    /*
     * Tables
     */

    public function table(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function caption(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function th(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function tr(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function td(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function thead(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function tbody(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function tfoot(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function col(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function colgroup(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    /*
     * Styles and Semantics
     */

    public function div(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function span(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function header(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function footer(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function main(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function section(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function article(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function aside(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function details(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function dialog(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function summary(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function data(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    /*
     * Programming
     */

    public function embed()
    {
        return $this->contentlessElement(__FUNCTION__);
    }

    public function object(...$content)
    {
        return $this->contentElement(__FUNCTION__, ...$content);
    }

    public function param()
    {
        return $this->contentlessElement(__FUNCTION__);
    }

    /*
     * Other Elements / Directives
     */

    public function yield()
    {
        return $this->yield;
    }

    public function icon($icon)
    {
        return new IconElement($icon);
    }

    public function include($include, $data = [])
    {
        return new IncludeElement($include, $data);
    }

    public function infiniteScroll(...$content)
    {
        return $this->hiddenElement(...$content)->id(__FUNCTION__);
    }

    public function swipeDownRefresh(...$content)
    {
        return $this->hiddenElement(...$content)->id(__FUNCTION__);
    }

    public function each($items, $closure)
    {
        return new EachDirective($items, $closure);
    }

    public function if($condition, $closure)
    {
        return new IfDirective($condition, $closure);
    }
}
