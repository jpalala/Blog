<?php

namespace App\Services;

// use Spatie\YamlFrontMatter\YamlFrontMatter;
use App\Repositories\PostRepository;
use Illuminate\Support\Facades\File;

class PostService
{
    public PostRepository $postRepository;

    public function getAllPosts()
    {
        return $this->postRepository->getAllPosts();
    }
   /**
     * Get the slug of a post by date and slug.
     *
     * @param int $year
     * @param int $month
     * @param int $day
     * @param string $slug
     * @return string|null
     */
    public function getPostSlugByDateAndSlug(int $year, int $month, int $day, string $slug)
    {
        $slug = $this->postRepository->getPostSlugByDateAndSlug($year, $month, $day, $slug);

        return $slug;
    }
}

