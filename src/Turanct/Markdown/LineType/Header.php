<?php

namespace Turanct\Markdown\LineType;

use Turanct\Markdown\Parser\Context;

class Header implements LineType
{
    public function append(LineType $type)
    {
        return false;
    }

    public function getBlockElement(Context $context)
    {
        return new \Turanct\Markdown\Element\Header($context->getLines());
    }
}
