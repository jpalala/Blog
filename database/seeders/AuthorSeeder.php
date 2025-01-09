// database/seeders/AuthorSeeder.php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    public function run()
    {
        // Create one cat that happens to be a writer too
        Author::create([
            'name' => 'Cat Meow',
            'email' => 'hi@meow.cat',
            'bio' => 'Meow meow meow meow',
	    'avatar_url' => 'https://placecats.com/300/200'
        ]);
    }
}

