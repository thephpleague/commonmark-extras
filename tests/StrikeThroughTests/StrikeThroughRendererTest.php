<?php

namespace League\CommonMark\Extras\Tests\StrikeThroughTests;

use League\CommonMark\Extras\StrikeThrough\StrikeThroughElement;
use League\CommonMark\Extras\StrikeThrough\StrikeThroughRenderer;
use League\CommonMark\HtmlElement;
use League\CommonMark\Inline\Renderer\CodeRenderer;

class StrikeThroughRendererTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var CodeRenderer
     */
    protected $renderer;

    protected function setUp()
    {
        $this->renderer = new StrikeThroughRenderer();
    }

    public function testRender()
    {
        $inline = new StrikeThroughElement('reviewed text');
        $inline->data['attributes'] = ['id' => 'some"&amp;id'];
        $fake_renderer = new FakeHtmlRenderer();
        $result = $this->renderer->render($inline, $fake_renderer);
        $this->assertTrue($result instanceof HtmlElement);
        $this->assertEquals('del', $result->getTagName());
        $this->assertContains('reviewed text', $result->getContents(true));
        $this->assertEquals(['id' => 'some"&amp;id'], $result->getAllAttributes());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testRenderWithInvalidType()
    {
        $inline = $this->getMockForAbstractClass('League\CommonMark\Inline\Element\AbstractInline');
        $fake_renderer = new FakeHtmlRenderer();
        $this->renderer->render($inline, $fake_renderer);
    }
}
