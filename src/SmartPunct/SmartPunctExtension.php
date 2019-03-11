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

namespace League\CommonMark\Extras\SmartPunct;

use League\CommonMark\Ext\SmartPunct as BaseExtension;

@trigger_error('The SmartPunct extension has been moved to league/commonmark-ext-smartpunct', E_USER_DEPRECATED);

/**
 * @deprecated Install and use league/commonmark-ext-smartpunct instead
 */
class SmartPunctExtension extends BaseExtension\SmartPunctExtension
{
}
