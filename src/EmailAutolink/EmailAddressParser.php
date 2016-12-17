<?php

/*
 * This file is part of the league/commonmark-extras package.
 *
 * (c) Colin O'Dell <colinodell@gmail.com>
 *
 * Original code based on the CommonMark JS reference parser (http://bitly.com/commonmark-js)
 *  - (c) John MacFarlane
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace League\CommonMark\Extras\EmailAutolink;

use League\CommonMark\Inline\Element\Link;
use League\CommonMark\Inline\Element\Text;
use League\CommonMark\Inline\Parser\AbstractInlineParser;
use League\CommonMark\InlineParserContext;
use League\CommonMark\Util\RegexHelper;

class EmailAddressParser extends AbstractInlineParser
{
    /**
     * {@inheritdoc}
     */
    public function getCharacters()
    {
        return ['@'];
    }

    /**
     * {@inheritdoc}
     */
    public function parse(InlineParserContext $inlineContext)
    {
        // There must be some text prior to the @
        $lastChild = $inlineContext->getContainer()->lastChild();
        if (!($lastChild instanceof Text)) {
            return false;
        }

        $everythingBeforeTheAtSymbol = $lastChild->getContent();
        if ($everythingBeforeTheAtSymbol === '') {
            return false;
        }

        // Attempt to parse the mailbox portion, which should exist at the very end of this string
        $matches = RegexHelper::matchAll('/[a-zA-Z0-9.!#$%&\'*+\\/=?^_`{|}~-]+$/', $everythingBeforeTheAtSymbol);
        if (empty($matches)) {
            return false;
        }

        $mailbox = end($matches);

        // Attempt to parse the '@' symbol and domain name
        $domain = $inlineContext->getCursor()->match('/^@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*/');
        if ($domain === null) {
            return false;
        }

        $address = $mailbox . $domain;

        $inlineContext->getContainer()->appendChild(new Link('mailto:' . $address, $address));

        // Remove the $mailbox part from $lastChild
        $newContent = substr($everythingBeforeTheAtSymbol, 0, 0 - strlen($mailbox));
        $lastChild->setContent($newContent);

        return true;
    }
}
