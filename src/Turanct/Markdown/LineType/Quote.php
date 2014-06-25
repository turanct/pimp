<?php

namespace Turanct\Markdown\LineType;

use Turanct\Markdown\Parser;
use Turanct\Markdown\Parser\Context;
use Turanct\Markdown\Parser\Line;

class Quote implements LineType
{
    public function append(LineType $type)
    {
        if ($type instanceof Quote || $type instanceof Paragraph || $type instanceof EmptyLine) {
            return new Quote();
        }

        return false;
    }

    public function getBlockContent(array $lines)
    {
        $lines = array_map(
            function(Line $line) {
                if (substr($line, 0, 1) == '>') {
                    $line = trim(substr($line, 1));
                }

                return $line;
            },
            $lines
        );

        $content = trim(implode("\n", $lines));

        $parser = new Parser();

        return $parser->parse($content);
    }

    public function getBlockElement($blockContent)
    {
        return new \Turanct\Markdown\Element\BlockQuote($blockContent);
    }
}
