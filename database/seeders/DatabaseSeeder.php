<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\BookGenre;
use App\Models\Genre;
use App\Models\Receipt;
use App\Models\Role;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            BookSeeder::class,
            UserSeeder::class,
            RoleSeeder::class,
            GenreSeeder::class,
            BookGenreSeeder::class
        ]);
        Receipt::factory(15)->create();
        Transaction::factory(30)->create();
    }
}
