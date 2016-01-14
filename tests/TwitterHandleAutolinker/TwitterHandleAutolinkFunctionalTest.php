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

namespace League\CommonMark\Extras\Tests\TwitterHandleAutolink;

use League\CommonMark\CommonMarkConverter;
use League\CommonMark\Environment;
use League\CommonMark\Extras\TwitterHandleAutolink\TwitterHandleAutolinkExtension;

class TwitterHandleAutolinkFunctionalTest extends \PHPUnit_Framework_TestCase
{
    private function createConverter()
    {
        $environment = new Environment();
        $environment->addExtension(new TwitterHandleAutolinkExtension());

        return new CommonMarkConverter([], $environment);
    }

    public function testValidTwitterHandle()
    {
        $converter = $this->createConverter();

        $input = 'This was written by @colinodell';
        $output = trim($converter->convertToHtml($input));

        $this->assertEquals('<p>This was written by <a href="https://twitter.com/colinodell">@colinodell</a></p>', $output);
    }

    public function testOverlyLongTwitterHandle()
    {
        $converter = $this->createConverter();

        $input = 'Usernames like @commonmarkisthebestmarkdownspec are too long';
        $output = trim($converter->convertToHtml($input));

        $this->assertEquals('<p>Usernames like @commonmarkisthebestmarkdownspec are too long</p>', $output);
    }

    public function testTwitterHandleWithPunctuationAtTheEnd()
    {
        $converter = $this->createConverter();

        $input = 'This was written by @colinodell!';
        $output = trim($converter->convertToHtml($input));

        $this->assertEquals('<p>This was written by <a href="https://twitter.com/colinodell">@colinodell</a>!</p>', $output);
    }

    public function testEmailAddress()
    {
        $converter = $this->createConverter();

        $input = 'Security issues should be emailed to colinodell@gmail.com';
        $output = trim($converter->convertToHtml($input));

        $this->assertEquals('<p>Security issues should be emailed to colinodell@gmail.com</p>', $output);
    }
}
