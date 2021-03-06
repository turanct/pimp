<?php

namespace Turanct\Markdown\Parser;

use Turanct\Markdown\LineType;

class BlockContext
{
    protected $lines = array();
    protected $type;

    public function addLine(Line $line)
    {
        if ($this->type === null) {
            if ($line->getType() instanceof LineType\EmptyLine) {
                // Do nothing
            } else {
                $this->lines[] = $line;
                $this->type = $line->getType();
            }
        } else {
            $newType = $this->type->append($line->getType());

            if ($newType === false) {
                return false;
            }

            $this->type = $newType;
            $this->lines[] = $line;
        }

        return true;
    }

    public function __toString()
    {
        $blockContent = $this->type->getBlockContent($this->lines);

        return (string) $this->type->getBlockElement($blockContent);
    }
}
