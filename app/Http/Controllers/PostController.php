<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PostService;

class PostController extends Controller
{

    protected PostService $postService; //injecting here the dependency

    public function __construct()
    {
      //  $this->postService = $postService;
    }

    public function index()
    {
        $posts = $this->postService->getAllPosts();
        return view('posts.index', compact('posts'));
    }

    public function show($year, $month, $day, $slug)
    {
         $
         $this->postService->getPostById($year); // where like created_at = 'y-m-d%' and matched slug

    }
}
