<?php

namespace Turanct\Markdown\LineType;

use Turanct\Markdown\Parser;

class OrderedList implements LineType
{
    protected $emptyLines = 0;

    public function append(LineType $type)
    {
        if ($type instanceof EmptyLine && $this->emptyLines > 0) {
            return false;
        } elseif (
            $type instanceof NumberLine
            || $type instanceof Paragraph
            || $type instanceof Code
            || $type instanceof Quote
        ) {
            $this->emptyLines = 0;

            return $this;
        } elseif ($type instanceof EmptyLine) {
            $this->emptyLines++;

            return $this;
        }

        return false;
    }

    public function getBlockContent(array $lines)
    {
        $listItems = array();
        $currentItem = array();

        foreach ($lines as $line) {
            if (
                preg_match('/^\d+\.\s/', $line)
                && !empty($currentItem)
            ) {
                $listItems[] = $currentItem;
                $currentItem = array();
            }

            $currentItem[] = $line;
        }

        $listItems[] = $currentItem;

        $parser = new Parser();

        foreach ($listItems as $key => $listItem) {
            $listItem[0] = substr($listItem[0], 1);

            if (count(array_filter($listItem, function($item){return (string) $item != '';})) > 1) {
                $content = $parser->parse(trim(implode("\n", $listItem)));
            } else {
                $content = ltrim($listItem[0]);
            }

            $listItems[$key] = new \Turanct\Markdown\Element\ListItem($content);
        }

        return trim(implode("\n", $listItems));
    }

    public function getBlockElement($blockContent)
    {
        return new \Turanct\Markdown\Element\OrderedList($blockContent);
    }
}
