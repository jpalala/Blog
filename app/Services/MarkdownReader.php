<?php

namespace App\Services;

use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Facades\File;

class MarkdownReader
{
    protected $directory;

    public function __construct($directory = null)
    {
        $this->directory = $directory ?? resource_path('markdown/posts');
    }

   /**
     * Parse a single Markdown file.
     */
    public function parseFile($path)
    {
        $content = File::get($path);
        $document = YamlFrontMatter::parse($content);

        return [
            'post_id' => $document->matter('post_id'),
            'date' => $document->matter('date'),
            'content' => $document->body(),
        ];
    }
}

