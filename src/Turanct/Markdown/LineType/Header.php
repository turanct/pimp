<?php

namespace Turanct\Markdown\LineType;

use Turanct\Markdown\Parser\Context;

class Header implements LineType
{
    public function append(LineType $type)
    {
        return false;
    }

    public function getBlockElement(array $lines)
    {
        return new \Turanct\Markdown\Element\Header($lines);
    }
}
