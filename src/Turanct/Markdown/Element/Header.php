<?php

namespace Turanct\Markdown\Element;

class Header extends BlockElement
{
    protected $header;

    public function __construct($content, $header = 1)
    {
        parent::__construct($content);

        if ($header > 6) {
            $header = 6;
        }

        $this->header = (int) $header;
    }

    public function __toString()
    {
        return '<h' . $this->header . '>' . $this->content . '</h' . $this->header . '>';
    }
}
