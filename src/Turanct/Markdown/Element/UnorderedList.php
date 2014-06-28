<?php

namespace Turanct\Markdown\Element;

class UnorderedList extends BlockElement
{
    public function __toString()
    {
        return '<ul>' . $this->content . '</ul>';
    }
}
