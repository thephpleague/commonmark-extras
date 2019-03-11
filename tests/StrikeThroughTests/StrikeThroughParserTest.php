<?php

namespace League\CommonMark\Extras\Tests\StrikeThroughTests;

use League\CommonMark\Extras\StrikeThrough\StrikeThroughElement;
use League\CommonMark\Extras\StrikeThrough\StrikeThroughParser;
use League\CommonMark\InlineParserContext;
use League\CommonMark\Reference\ReferenceMap;

class StrikeThroughParserTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param $string
     * @param $expected
     *
     * @dataProvider dataForTestParse
     */
    public function testParse($string, $expected)
    {
        $nodeStub = $this->createMock('League\CommonMark\Block\Element\AbstractBlock');
        $nodeStub->expects($this->any())->method('getStringContent')->willReturn($string);
        $nodeStub
            ->expects($this->once())
            ->method('appendChild')
            ->with($this->callback(function (StrikeThroughElement $s) use ($expected) {
                return $s instanceof StrikeThroughElement && $expected === $s->getContent();
            }));
        $inline_context = new InlineParserContext($nodeStub, new ReferenceMap());

        // Move to just before the first tilde pair
        $first_tilde_pos = mb_strpos($string, '~~', null, 'utf-8');
        $inline_context->getCursor()->advanceBy($first_tilde_pos);

        $parser = new StrikeThroughParser();
        $parser->parse($inline_context);
    }

    /**
     * @return array
     */
    public function dataForTestParse()
    {
        return [
            ['This is just an ~~integration~~ unit test', 'integration'],
            ['Из: твоя ~~feature~~ ветка', 'feature'],
            ['Из: твоя ~~тест~~ ветка', 'тест'],
        ];
    }
}
