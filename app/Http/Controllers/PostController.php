<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PostService;
use Illuminate\Support\Facades\File;
use App\Services\MarkdownParser;
use League\CommonMark\CommonMarkConverter;

class PostController extends Controller
{

    protected $postService; //injecting here the dependency
    protected $mdParser; //injecting here the dependency

    public function __construct(PostService $postService, MarkdownParser $mdParser)
    {
        $this->postService = $postService;
        $this->mdParser = $mdParser;
    }

    public function index()
    {
        $posts = $this->postService->getAllPosts();
        return view('posts.index', compact('posts'));
    }

    public function show($year, $month,  $slug)
    {
        $fileContent = $this->_fileGet($slug);

        [$frontMatter, $content] = $this->parseFileContent($fileContent);

        return view('blog.show', [
            'title' => $frontMatter['title'] ?? 'Untitled',
            'published_at' => $frontMatter['published_at'] ?? 'Unknown Date',
            'content' => $contentHtml
        ]);
    }

    /**
     * parseFileContent
     * Parse the markdown file into frontMatter and contentHTML
    */
    private function parseFileContent($fileContent)
    {
        $frontMatter, $content = '';

        $parsedData = $this->mdParser->parse($fileContent);

        $frontMatter = $parsedData['frontMatter'];
        $content = $parsedData['content'];

        // Convert Markdown content to HTML
        $converter = new CommonMarkConverter();
        $contentHtml = $converter->convertToHtml($content);

        return [$frontMatter, $contentHtml]
    }
}
