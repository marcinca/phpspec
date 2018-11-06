<?php
namespace App\Markdown;

interface WriterInterface
{
    public function writeText(String $string);
}