<?php

namespace Turanct\Markdown\Element;

class Paragraph extends BlockElement
{
    public function __toString()
    {
        return '<p>' . trim(implode("\n", $this->lines)) . '</p>';
    }
}
