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

use League\CommonMark\Ext\Autolink\AutolinkExtension;
use League\CommonMark\Ext\SmartPunct\SmartPunctExtension;
use League\CommonMark\Extension\ExtensionInterface;

final class CommonMarkExtrasExtension implements ExtensionInterface
{
    /** @var ExtensionInterface[] */
    private $extensions = [];

    public function __construct()
    {
        $this->extensions = [
            new SmartPunctExtension(),
            new AutolinkExtension(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockParsers()
    {
        $ret = [];
        foreach ($this->extensions as $extension) {
            foreach ($extension->getBlockParsers() as $parser) {
                $ret[] = $parser;
            }
        }

        return $ret;
    }

    /**
     * {@inheritdoc}
     */
    public function getInlineParsers()
    {

        $ret = [];
        foreach ($this->extensions as $extension) {
            foreach ($extension->getInlineParsers() as $parser) {
                $ret[] = $parser;
            }
        }

        return $ret;
    }

    /**
     * {@inheritdoc}
     */
    public function getInlineProcessors()
    {
        $ret = [];
        foreach ($this->extensions as $extension) {
            foreach ($extension->getInlineProcessors() as $processor) {
                $ret[] = $processor;
            }
        }

        return $ret;
    }

    /**
     * {@inheritdoc}
     */
    public function getDocumentProcessors()
    {
        $ret = [];
        foreach ($this->extensions as $extension) {
            foreach ($extension->getDocumentProcessors() as $processor) {
                $ret[] = $processor;
            }
        }

        return $ret;
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockRenderers()
    {
        $ret = [];
        foreach ($this->extensions as $extension) {
            foreach ($extension->getBlockRenderers() as $class => $renderer) {
                $ret[$class] = $renderer;
            }
        }

        return $ret;
    }

    /**
     * {@inheritdoc}
     */
    public function getInlineRenderers()
    {

        $ret = [];
        foreach ($this->extensions as $extension) {
            foreach ($extension->getInlineRenderers() as $class => $renderer) {
                $ret[$class] = $renderer;
            }
        }

        return $ret;
    }
}
