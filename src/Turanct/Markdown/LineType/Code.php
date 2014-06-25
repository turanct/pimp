<?php

namespace Turanct\Markdown\LineType;

use Turanct\Markdown\Parser;
use Turanct\Markdown\Parser\Context;
use Turanct\Markdown\Parser\Line;

class Code implements LineType
{
    public function append(LineType $type)
    {
        if ($type instanceof Code || $type instanceof EmptyLine) {
            return new Code();
        }

        return false;
    }

    public function getBlockContent(array $lines)
    {
        $lines = array_map(
            function(Line $line) {
                if (substr($line, 0, 1) == "\t") {
                    $line = substr($line, 1);
                } elseif (substr($line, 0, 4) == '    ') {
                    $line = substr($line, 4);
                }

                return $line;
            },
            $lines
        );

        $content = implode("\n", $lines);
        $content = htmlentities($content, ENT_NOQUOTES);
        $content = rtrim($content);

        return $content;
    }

    public function getBlockElement($blockContent)
    {
        return new \Turanct\Markdown\Element\Code($blockContent);
    }
}
