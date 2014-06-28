<?php

namespace Turanct\Markdown\Element;

class ListItem extends BlockElement
{
    public function __toString()
    {
        return '<li>' . $this->content . '</li>';
    }
}
