<?php

namespace Turanct\Markdown\LineType;

use Turanct\Markdown\Parser\Context;

class SingleLine implements LineType
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
        return new \Turanct\Markdown\Element\HorizontalRule($blockContent);
    }
}
