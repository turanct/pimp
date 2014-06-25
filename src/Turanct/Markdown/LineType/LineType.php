<?php

namespace Turanct\Markdown\LineType;

use Turanct\Markdown\Parser\Context;

interface LineType
{
    public function append(LineType $type);
    public function getBlockContent(array $lines);
    public function getBlockElement($blockContent);
}
