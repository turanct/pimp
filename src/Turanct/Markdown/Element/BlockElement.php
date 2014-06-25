<?php

namespace Turanct\Markdown\Element;

abstract class BlockElement
{
    protected $content;

    public function __construct($content)
    {
        $this->content = (string) $content;
    }

    abstract public function __toString();
}
