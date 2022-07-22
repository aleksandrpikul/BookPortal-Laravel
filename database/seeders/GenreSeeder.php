<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Genre::create([
            'name' => 'Literary Fiction'
        ]);
        Genre::create([
            'name' => 'Mystery'
        ]);
        Genre::create([
            'name' => 'Thriller'
        ]);
        Genre::create([
            'name' => 'Horror'
        ]);
        Genre::create([
            'name' => 'Historical'
        ]);
        Genre::create([
            'name' => 'Romance'
        ]);
        Genre::create([
            'name' => 'Western'
        ]);
        Genre::create([
            'name' => 'Bildungsroman'
        ]);
        Genre::create([
            'name' => 'Speculative Fiction'
        ]);
        Genre::create([
            'name' => 'Science Fiction'
        ]);
        Genre::create([
            'name' => 'Dystopian'
        ]);
        Genre::create([
            'name' => 'Magical Realism'
        ]);
        Genre::create([
            'name' => 'Realist Literature'
        ]);
    }
}
