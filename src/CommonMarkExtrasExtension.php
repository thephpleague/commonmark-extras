<?php

/*
 * This file is part of the league/commonmark-extras package.
 *
 * (c) Colin O'Dell <colinodell@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace League\CommonMark\Extras;

use League\CommonMark\ConfigurableEnvironmentInterface;
use League\CommonMark\Extension\Autolink\AutolinkExtension;
use League\CommonMark\Extension\GithubFlavoredMarkdownExtension;
use League\CommonMark\Extension\SmartPunct\SmartPunctExtension;
use League\CommonMark\Extension\Strikethrough\StrikethroughExtension;
use League\CommonMark\Extension\Table\TableExtension;
use League\CommonMark\Extension\TaskList\TaskListExtension;
use League\CommonMark\Extension\ExtensionInterface;

/**
 * @deprecated The league/commonmark-extras extension is now deprecated. All functionality has been moved into league/commonmark 1.3+, so use that instead.
 */
final class CommonMarkExtrasExtension implements ExtensionInterface
{
    public function __construct()
    {
        @trigger_error(sprintf('league/commonmark-extras is deprecated; use individual extensions or %s from league/commonmark 1.3+ instead', GithubFlavoredMarkdownExtension::class), E_USER_DEPRECATED);
    }

    public function register(ConfigurableEnvironmentInterface $environment)
    {
        $environment->addExtension(new AutolinkExtension());
        $environment->addExtension(new SmartPunctExtension());
        $environment->addExtension(new StrikethroughExtension());
        $environment->addExtension(new TableExtension());
        $environment->addExtension(new TaskListExtension());
    }
}
