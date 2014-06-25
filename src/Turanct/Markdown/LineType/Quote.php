<?php

namespace Turanct\Markdown\LineType;

use Turanct\Markdown\Parser\Context;

class Quote implements LineType
{
    public function append(LineType $type)
    {
        if ($type instanceof Quote || $type instanceof Paragraph || $type instanceof EmptyLine) {
            return new Quote();
        }

        return false;
    }

    public function getBlockElement(array $lines)
    {
        return new \Turanct\Markdown\Element\BlockQuote($lines);
    }
}
