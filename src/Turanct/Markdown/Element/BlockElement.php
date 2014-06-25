<?php

namespace Turanct\Markdown\Element;

abstract class BlockElement
{
    protected $lines;

    public function __construct(array $lines)
    {
        $this->lines = $lines;
    }

    abstract public function __toString();
}
