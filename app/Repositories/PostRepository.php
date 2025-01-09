<?php
namespace App\Repositories;

use App\Models\Post;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PostRepository
{
    /**
     * Get all posts with undeleted scope applied.
     */
    public function getAllPosts()
    {
        return Post::whereNull('deleted_at')->get();
    }

    /**
     * Get a post by year, month, day, and slug.
     *
     * @param int $year
     * @param int $month
     * @param int $day
     * @param string $slug
     * @return \App\Models\Post|null
     */
    public function getPostSlugByDateAndSlug(int $year, int $month, int $day, string $slug): slug
    {
        try {
            // Use Carbon to create a date from the given year, month, and day
            $date = Carbon::createFromDate($year, $month, $day);

            $post = Post::whereYear('created_at', $date->year)
                        ->whereMonth('created_at', $date->month)
                        ->whereDay('created_at', $date->day)
                        ->where('slug', $slug)
                        ->select('slug') // select only the slug
                        ->firstOrFail();
            // Return the slug (to be used for looking up the file content
            // from the resources/markdown/posts folder
            return $post->slug;

        } catch (odelNotFoundException $e) {
            // Handle the case where the post is not found, if you want
            abort(404, 'Post not found');
        }
    }

    /**
     * Get a single post by its ID.
     */
    public function getPostById($id)
    {
        return Post::findOrFail($id);
    }
}

