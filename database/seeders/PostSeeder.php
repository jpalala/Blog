<?php

// database/seeders/PostSeeder.php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Author;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run()
    {
        // Get the author ID (assuming one author)
        $author = Author::first();

        // Create 3 posts associated with the author
        Post::create([
            'title' => 'First Blog Post',
            'content' => 'This is the first blog post content.',
            'status' => 'draft', // Published
            'author_id' => $author->id,
        ]);

        Post::create([
            'title' => 'Second Blog Post',
            'content' => 'This is the second blog post content.',
            'status' => 'published',
            'author_id' => $author->id,
        ]);

        Post::create([
            'title' => 'Third Blog Post',
            'content' => 'This is the third blog post content.',
            'status' => 'published',
            'author_id' => $author->id,
        ]);
    }
}

