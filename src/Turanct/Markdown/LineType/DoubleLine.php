<?php

namespace Turanct\Markdown\LineType;

use Turanct\Markdown\Parser\Context;

class DoubleLine implements LineType
{
    public function append(LineType $type)
    {
        return false;
    }

    public function getBlockElement(Context $context)
    {
        throw new RuntimeException('This method should never be called');
    }
}
