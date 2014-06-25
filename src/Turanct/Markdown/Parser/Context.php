<?php

namespace Turanct\Markdown\Parser;

use Turanct\Markdown\LineType;

class Context
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
    }

    public function getLines()
    {
        return $this->lines;
    }

    public function __toString()
    {
        return (string) $this->type->getBlockElement($this->lines);
    }
}
