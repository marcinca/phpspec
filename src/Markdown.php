<?php
namespace App;

use App\Markdown\ReaderInterface;
use App\Markdown\WriterInterface;

/**
 * Class Markdown
 * @package App
 * @source http://www.phpspec.net/en/stable/manual/prophet-objects.html
 */
class Markdown implements MarkdownInterface
{
    public function convertToHtml(String $string)
    {
        return '<p>' . $string . '</p>';
    }

    public function toHtmlFromReader(ReaderInterface $reader)
    {
        return $this->convertToHtml($reader->getMarkdown());
    }

    public function outputHtml($string, WriterInterface $writer)
    {
        return $writer->writeText($string);
    }
}
