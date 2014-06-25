<?php

namespace Turanct\Markdown\LineType;

use Turanct\Markdown\Parser\Context;

class EmptyLine implements LineType
{
    public function append(LineType $type)
    {
        return false;
    }

    public function getBlockElement(array $lines)
    {
        throw new RuntimeException('This method should never be called');
    }
}
