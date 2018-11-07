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

    /**
     * Basic example
     */
    function it_converts_plain_text_to_html_paragraphs()
    {
        $this->convertToHtml("Hi, there")->shouldReturn("<p>Hi, there</p>");
    }

    /**
     * Stub example
     * @param ReaderInterface|\PhpSpec\Wrapper\Collaborator $reader
     */
    function it_converts_text_from_an_external_source(ReaderInterface $reader)
    {
        $reader->beADoubleOf('App\Markdown\ReaderInterface');
        /*
         *  Set the fake stub of value of a given function
         */
        $reader->getMarkdown()->willReturn("Hi, there");

        $this->toHtmlFromReader($reader)->shouldReturn("<p>Hi, there</p>");
    }

    /**
     * Mock example - tests outputHtml
     * @param WriterInterface|\PhpSpec\Wrapper\Collaborator $writer
     */
    function it_outputs_converted_text(WriterInterface $writer)
    {
        $writer->writeText("<p>Hi, there</p>")->shouldBeCalled();

        /*
         *  This one will fail
         */
        // $this->outputHtml("Hi, there", $writer);

        /*
         *  This one succeeds
         */
        $this->outputHtml("<p>Hi, there</p>", $writer);
    }

    /**
     * Spy example - check what happened after the object’s behaviour has happened (alternative to Mock)
     * @param \PhpSpec\Wrapper\Collaborator|WriterInterface $writer
     */
    function it_checks_converted_text_output(WriterInterface $writer)
    {
        $this->outputHtml("<p>Hi, there</p>", $writer);
        // $this->outputHtml("Hi, there", $writer);

        $writer->writeText("<p>Hi, there</p>")->shouldHaveBeenCalled();
    }
}
