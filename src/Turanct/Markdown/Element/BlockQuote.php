<?php

namespace Turanct\Markdown\Element;

class BlockQuote extends BlockElement
{
    public function __toString()
    {
        $this->lines = array_map(
            function($line) {
                if (substr($line->getText(), 0, 1) == '>') {
                    $line = trim(substr($line->getText(), 1));
                }

                return $line;
            },
            $this->lines
        );

        return '<blockquote>' . trim(implode("\n", $this->lines)) . '</blockquote>';
    }
}
