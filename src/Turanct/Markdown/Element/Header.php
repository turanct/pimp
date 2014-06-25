<?php

namespace Turanct\Markdown\Element;

class Header extends BlockElement
{
    public function __toString()
    {
        $firstLine = reset($this->lines);
        $lastLine = end($this->lines);

        if (count($this->lines) > 1) {
            if (substr($lastLine, 0, 1) == '=') {
                $header = 1;
            } else {
                $header = 2;
            }
        } else {
            $header = substr_count($firstLine, '#');
            $firstLine = str_replace('#', '', $firstLine);
        }

        $firstLine = trim($firstLine);

        return '<h' . $header . '>' . $firstLine . '</h' . $header . '>';
    }
}
