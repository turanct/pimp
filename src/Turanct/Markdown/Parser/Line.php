<?php

namespace Turanct\Markdown\Parser;

use Turanct\Markdown\LineType;

class Line
{
    protected $type;
    protected $text;

    public function __construct($text)
    {
        $this->text = (string) $text;
        $this->type = $this->findType($text);
    }

    public function findType($text)
    {
        if (trim($text) == '') {
            return new LineType\EmptyLine();
        } elseif (
            trim($text, '- ') == ''
            || trim($text, '* ') == ''
        ) {
            return new LineType\SingleLine();
        } elseif (trim($text, '=') == '') {
            return new LineType\DoubleLine();
        } elseif (substr($text, 0, 1) == '#') {
            return new LineType\Header();
        } elseif (substr(ltrim($text), 0, 1) == '>') {
            return new LineType\Quote();
        } elseif (
            substr($text, 0, 2) == '* '
            || substr($text, 0, 2) == '- '
            || substr($text, 0, 2) == '+ '
        ) {
            return new LineType\StarLine();
        } elseif (preg_match('/^\d+\.\s/', $text)) {
            return new LineType\NumberLine();
        } elseif (
            substr($text, 0, 1) == "\t"
            || substr($text, 0, 4) == '    '
        ) {
            return new LineType\Code();
        } else {
            return new LineType\Paragraph();
        }
    }

    public function getType()
    {
        return $this->type;
    }

    public function getText()
    {
        return $this->text;
    }

    public function __toString()
    {
        return $this->getText();
    }
}
