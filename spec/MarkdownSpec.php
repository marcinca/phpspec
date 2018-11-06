<?php
namespace spec\App;

use App\Markdown;
use App\Markdown\ReaderInterface;
use App\Markdown\WriterInterface;
use PhpSpec\ObjectBehavior;

/**
 * Class MarkdownSpec
 * @package spec\App
 */
class MarkdownSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Markdown::class);
    }

    function it_converts_plain_text_to_html_paragraphs()
    {
        $this->convertToHtml("Hi, there")->shouldReturn("<p>Hi, there</p>");
    }

    function it_converts_text_from_an_external_source(ReaderInterface $reader)
    {
        $reader->beADoubleOf('App\Markdown\ReaderInterface');
        $reader->getMarkdown()->willReturn("Hi, there");
        $this->toHtmlFromReader($reader)->shouldReturn("Hi, there");
    }

    function it_outputs_converted_text(WriterInterface $writer)
    {
        $writer->writeText("<p>Hi, there</p>")->shouldBeCalled();
        $this->outputHtml("<p>Hi, there</p>", $writer);
    }
}
