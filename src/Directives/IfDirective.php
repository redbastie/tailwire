<?php

namespace Redbastie\Tailwire\Directives;

class IfDirective
{
    private $conditions = [];

    public function __construct($condition, $closure)
    {
        $this->conditions[] = [$condition, $closure];
    }

    public function elseif($condition, $closure)
    {
        $this->conditions[] = [$condition, $closure];

        return $this;
    }

    public function else($closure)
    {
        $this->conditions[] = [true, $closure];

        return $this;
    }

    public function __toString()
    {
        foreach ($this->conditions as $condition) {
            if ($condition[0]) {
                return $condition[1]();
            }
        }

        return '';
    }
}
