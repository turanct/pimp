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
        } elseif (substr($text, 0, 2) == '--') {
            return new LineType\SingleLine();
        } elseif (substr($text, 0, 2) == '==') {
            return new LineType\DoubleLine();
        } elseif (substr($text, 0, 1) == '#') {
            return new LineType\Header();
        } elseif (substr($text, 0, 1) == '>') {
            return new LineType\Quote();
        } elseif (substr($text, 0, 1) == "\t") {
            return new LineType\Code();
        } elseif (substr($text, 0, 4) == '    ') {
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
