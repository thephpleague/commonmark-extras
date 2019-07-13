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
"You can contact the author of this ~~project~~ library at colinodell@gmail.com or check out his website: https://www.colinodell.com"

| My Favorite CommonMark Parsers |
| ------------------------------ |
| `league/commonmark`            |

Don't forget to:

 - [ ] Star this repository
 - [x] Keep on being awesome!
EOT;

        $expected = <<<EOT
<p>“You can contact the author of this <del>project</del> library at <a href="mailto:colinodell@gmail.com">colinodell@gmail.com</a> or check out his website: <a href="https://www.colinodell.com">https://www.colinodell.com</a>”</p>
<table>
<thead>
<tr>
<th>My Favorite CommonMark Parsers</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>league/commonmark</code></td>
</tr>
</tbody>
</table>
<p>Don’t forget to:</p>
<ul>
<li>
<input disabled="" type="checkbox" /> Star this repository</li>
<li>
<input disabled="" type="checkbox" checked="" /> Keep on being awesome!</li>
</ul>

EOT;

        $environment = Environment::createCommonMarkEnvironment();
        $environment->addExtension(new CommonMarkExtrasExtension());

        $converter = new CommonMarkConverter([], $environment);

        $this->assertEquals($expected, $converter->convertToHtml($input));
    }
}
