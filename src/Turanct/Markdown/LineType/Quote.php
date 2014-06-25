<?php

namespace Turanct\Markdown\LineType;

use Turanct\Markdown\Parser;
use Turanct\Markdown\Parser\Context;
use Turanct\Markdown\Parser\Line;

class Quote implements LineType
{
    public function append(LineType $type)
    {
        if ($type instanceof EmptyLine) {
            return new QuoteEmptyLine();
        } elseif ($type instanceof Quote || $type instanceof Paragraph) {
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

        $nonEmptyLines = array_filter(
            $lines,
            function($line) {
                if (trim($line) == '') {
                    return false;
                }

                return true;
            }
        );

        if (count($nonEmptyLines) > 1) {
            $parser = new Parser();
            $content = $parser->parse($content);
        }

        return $content;
    }

    public function getBlockElement($blockContent)
    {
        return new \Turanct\Markdown\Element\BlockQuote($blockContent);
    }
}
