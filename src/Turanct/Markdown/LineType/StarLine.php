<?php

namespace Turanct\Markdown\LineType;

class StarLine extends Paragraph
{
    protected $emptyLines = 0;

    public function append(LineType $type)
    {
        if ($type instanceof EmptyLine && $this->emptyLines > 0) {
            return false;
        } elseif (
            ($type instanceof Paragraph && !$type instanceof Starline)
            || $type instanceof EmptyLine
            || $type instanceof Code
            || $type instanceof Quote
        ) {
            $this->emptyLines = 0;

            return $this;
        } elseif ($type instanceof EmptyLine) {
            $this->emptyLines++;

            return $this;
        } elseif ($type instanceof StarLine) {
            return new UnorderedList();
        }

        return parent::append($type);
    }

    public function getBlockContent(array $lines)
    {
        // @todo: this should get parsed again... (?)

        return parent::getBlockContent($lines);
    }
}
