<?php

namespace Turanct\Markdown\Element;

class Code extends BlockElement
{
    public function __toString()
    {
        return '<pre><code>' . $this->content . '</code></pre>';
    }
}
