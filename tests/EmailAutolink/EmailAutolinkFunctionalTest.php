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

namespace League\CommonMark\Extras\Tests\EmailAutolink;

use League\CommonMark\CommonMarkConverter;
use League\CommonMark\Environment;
use League\CommonMark\Extras\EmailAutolink\EmailAutolinkExtension;

class EmailAutolinkFunctionalTest extends \PHPUnit_Framework_TestCase
{
    private function createConverter()
    {
        $environment = new Environment();
        $environment->addExtension(new EmailAutolinkExtension());

        return new CommonMarkConverter([], $environment);
    }

    public function testEmailAddress()
    {
        $converter = $this->createConverter();

        $input = 'Security issues should be emailed to colinodell@gmail.com';
        $output = trim($converter->convertToHtml($input));

        $this->assertEquals('<p>Security issues should be emailed to <a href="mailto:colinodell@gmail.com">colinodell@gmail.com</a></p>', $output);
    }

    public function testMoreComplexEmailAddress()
    {
        $converter = $this->createConverter();

        $input = 'Some crazy email address: colinodell+example_1@hotmail.co.uk';
        $output = trim($converter->convertToHtml($input));

        $this->assertEquals('<p>Some crazy email address: <a href="mailto:colinodell+example_1@hotmail.co.uk">colinodell+example_1@hotmail.co.uk</a></p>', $output);
    }

    public function testTwitterHandle()
    {
        $converter = $this->createConverter();

        $input = '@colinodell wrote this extension';
        $output = trim($converter->convertToHtml($input));

        $this->assertEquals('<p>@colinodell wrote this extension</p>', $output);
    }

    public function testEmailWithPunctuationAtTheEnd()
    {
        $converter = $this->createConverter();

        $input = 'Security issues should be emailed to colinodell@gmail.com.';
        $output = trim($converter->convertToHtml($input));

        $this->assertEquals('<p>Security issues should be emailed to <a href="mailto:colinodell@gmail.com">colinodell@gmail.com</a>.</p>', $output);
    }
}
