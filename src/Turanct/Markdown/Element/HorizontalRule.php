<?php

namespace Turanct\Markdown\Element;

class HorizontalRule extends BlockElement
{
    public function __toString()
    {
        return '<hr>';
    }
}
