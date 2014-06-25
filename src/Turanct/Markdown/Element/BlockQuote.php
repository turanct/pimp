<?php

namespace Turanct\Markdown\Element;

class BlockQuote extends BlockElement
{
    public function __toString()
    {
        return '<blockquote>' . $this->content . '</blockquote>';
    }
}
