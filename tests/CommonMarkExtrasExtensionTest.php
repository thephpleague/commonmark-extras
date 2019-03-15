<?php

/*
 * This file is part of the league/commonmark-extras package.
 *
 * (c) Colin O'Dell <colinodell@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace League\CommonMark\Extras\Tests;

use League\CommonMark\CommonMarkConverter;
use League\CommonMark\Environment;
use League\CommonMark\Extras\CommonMarkExtrasExtension;
use PHPUnit\Framework\TestCase;

final class CommonMarkExtrasExtensionTest extends TestCase
{
    public function testExtension()
    {
        $input = <<<EOT
"You can contact the author of this library at colinodell@gmail.com or check out his website: https://www.colinodell.com"
EOT;

        $expected = <<<EOT
<p>“You can contact the author of this library at <a href="mailto:colinodell@gmail.com">colinodell@gmail.com</a> or check out his website: <a href="https://www.colinodell.com">https://www.colinodell.com</a>”</p>

EOT;

        $environment = Environment::createCommonMarkEnvironment();
        $environment->addExtension(new CommonMarkExtrasExtension());

        $converter = new CommonMarkConverter([], $environment);

        $this->assertEquals($expected, $converter->convertToHtml($input));
    }
}
