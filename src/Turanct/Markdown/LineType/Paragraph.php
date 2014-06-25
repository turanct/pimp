<?php

namespace Turanct\Markdown\LineType;

use Turanct\Markdown\Parser\Context;

class Paragraph implements LineType
{
    public function append(LineType $type)
    {
        if ($type instanceof Paragraph) {
            return new Paragraph();
        } elseif ($type instanceof SingleLine || $type instanceof DoubleLine) {
            return new Header();
        }

        return false;
    }

    public function getBlockElement(Context $context)
    {
        return new \Turanct\Markdown\Element\Paragraph($context->getLines());
    }
}
