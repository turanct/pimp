<?php

namespace Turanct\Markdown;

class Parser
{
    public function parse($markdown)
    {
        $contexts = array();
        $context = new Parser\BlockContext();

        $lines = explode("\n", $markdown);

        foreach ($lines as $line) {
            $line = new Parser\Line($line);

            if ($context->addLine($line) === false) {
                $contexts[] = $context;

                $context = new Parser\BlockContext();
                $context->addLine($line);
            }
        }

        $contexts[] = $context;

        return implode("\n", $contexts);
    }
}
