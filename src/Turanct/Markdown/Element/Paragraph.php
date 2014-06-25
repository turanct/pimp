<?php

namespace Turanct\Markdown\Element;

class Paragraph extends BlockElement
{
    public function __toString()
    {
        return '<p>' . $this->content . '</p>';
    }
}
