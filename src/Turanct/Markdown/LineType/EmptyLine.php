<?php

namespace Turanct\Markdown\LineType;

use Turanct\Markdown\Parser\Context;

class EmptyLine implements LineType
{
    public function append(LineType $type)
    {
        return false;
    }

    public function getBlockContent(array $lines)
    {
        return null;
    }

    public function getBlockElement($blockContent)
    {
        throw new RuntimeException('This method should never be called');
    }
}
