<?php

namespace League\CommonMark\Extras\StrikeThrough;

use League\CommonMark\Inline\Element\Text;
use League\CommonMark\Inline\Parser\AbstractInlineParser;
use League\CommonMark\InlineParserContext;

class StrikeThroughParser extends AbstractInlineParser {
    public function getCharacters()
    {
        return ['~'];
    }

    public function parse(InlineParserContext $inlineContext)
    {
        $cursor = $inlineContext->getCursor();
        $character = $cursor->getCharacter();
        if ($cursor->peek(1) != $character) {
            return false;
        }
        $tildes = $cursor->match('/^~~+/');
        if ($tildes === '') {
            false;
        }
        $previousState = $cursor->saveState();
        $currentPosition = $cursor->getPosition();
        while ($matchingTildes = $cursor->match('/~~+/m')) {
            if ($matchingTildes === $tildes) {
                $text = mb_substr($cursor->getLine(), $currentPosition, $cursor->getPosition() - $currentPosition - strlen($tildes), 'utf-8');
                $text = preg_replace('/[ \n]+/', ' ', $text);
                $inlineContext->getContainer()->appendChild(new StrikeThroughElement(trim($text)));
                return true;
            }
        }
        $cursor->restoreState($previousState);
        $inlineContext->getContainer()->appendChild(new Text($tildes));
        return false;
    }
}