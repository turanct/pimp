<?php

namespace Turanct\Markdown\LineType;

class QuoteEmptyLine extends Quote
{
    public function append(LineType $type)
    {
        if ($type instanceof Quote) {
            return new Quote();
        }

        return false;
    }
}
