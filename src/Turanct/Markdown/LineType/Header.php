<?php

namespace Turanct\Markdown\LineType;

use Turanct\Markdown\Parser\Context;

class Header implements LineType
{
    protected $header = 1;

    public function append(LineType $type)
    {
        return false;
    }

    public function getBlockContent(array $lines)
    {
        $firstLine = reset($lines);
        $lastLine = end($lines);

        if (count($lines) > 1) {
            if (substr($lastLine, 0, 1) == '=') {
                $header = 1;
            } else {
                $header = 2;
            }
        } else {
            $header = substr_count($firstLine, '#');
            $firstLine = str_replace('#', '', $firstLine);
        }

        $this->header = $header;

        $firstLine = trim($firstLine);

        return $firstLine;
    }

    public function getBlockElement($blockContent)
    {
        return new \Turanct\Markdown\Element\Header($blockContent, $this->header);
    }
}
