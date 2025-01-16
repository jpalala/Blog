<?php

namespace App\Services;

use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Facades\File;

class MarkdownReader
{
    /**
     * Parse
     *
     * Parse a raw  Markdown with frontmatter file.
     * Wrapper around YamlFrontMatter::parse()
     *
     * @param string $content The raw Markdown file content.
     * @return array Parsed data containing 'frontMatter' and 'content'.
    */
    public function parse($content)
    {
        $document = YamlFrontMatter::parse($content);

        return [
            'frontMatter' => $document->matter(),
            'content' => $document->body(),
        ];
    }
}
