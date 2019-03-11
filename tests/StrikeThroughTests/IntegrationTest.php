<?php
namespace League\CommonMark\Extras\Tests\StrikeThroughTests;

use League\CommonMark\DocParser;
use League\CommonMark\Environment;
use League\CommonMark\Extras\StrikeThrough\StrikeThroughParser;
use League\CommonMark\Extras\StrikeThrough\StrikeThroughRenderer;
use League\CommonMark\HtmlRenderer;

class IntegrationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param string $string
     * @param string $expected
     * @return void
     *
     * @dataProvider dataForIntegrationTest
     */
    public function testStrikeThrough($string, $expected)
    {
        $environment = Environment::createCommonMarkEnvironment();
        $environment->addInlineParser(new StrikeThroughParser());
        $environment->addInlineRenderer('League\CommonMark\Extras\StrikeThrough\StrikeThroughElement', new StrikeThroughRenderer());

        $parser = new DocParser($environment);
        $renderer = new HtmlRenderer($environment);

        $document = $parser->parse($string);

        $html = $renderer->renderBlock($document);
        $this->assertSame($expected, $html);
    }

    /**
     * @return array
     */
    public function dataForIntegrationTest()
    {
        return [
            ['This is a test without any strikethroughs', "<p>This is a test without any strikethroughs</p>\n"],
            ['This is a test without any ~valid~ strikethroughs', "<p>This is a test without any ~valid~ strikethroughs</p>\n"],
            ['This is a test `without` any ~valid~ strikethroughs', "<p>This is a test <code>without</code> any ~valid~ strikethroughs</p>\n"],
            ['This is a ~~unit~~ integration test', "<p>This is a <del>unit</del> integration test</p>\n"],
        ];
    }
}