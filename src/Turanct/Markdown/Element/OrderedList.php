<?php

namespace Turanct\Markdown\Element;

class OrderedList extends BlockElement
{
    public function __toString()
    {
        return '<ol>' . $this->content . '</ol>';
    }
}
