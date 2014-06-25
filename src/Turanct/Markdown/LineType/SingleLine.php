<?php

namespace Turanct\Markdown\LineType;

use Turanct\Markdown\Parser\Context;

class SingleLine implements LineType
{
    public function append(LineType $type)
    {
        return false;
    }

    public function getBlockElement(Context $context)
    {
        return new \Turanct\Markdown\Element\HorizontalRule($context->getLines());
    }
}
