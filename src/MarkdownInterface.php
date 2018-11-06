<?php
namespace App;

interface MarkdownInterface
{
    public function convertToHtml(String $string);
}