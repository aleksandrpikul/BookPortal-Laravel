<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Book::create([
            'name' => 'Children 01',
            'author' => 'Koontz Gansu',
            'price' => 34000,
            'synopsis' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim corrupti cum excepturi soluta tempora perspiciatis ipsam quis tempore quisquam ea.',
            'cover' => 'children_1.png'
        ]);
        Book::create([
            'name' => 'Children 02',
            'author' => 'Koontz Gansu',
            'price' => 39000,
            'synopsis' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim corrupti cum excepturi soluta tempora perspiciatis ipsam quis tempore quisquam ea.',
            'cover' => 'children_2.png'
        ]);
        Book::create([
            'name' => 'Children 03',
            'author' => 'Koontz Gansu',
            'price' => 43000,
            'synopsis' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim corrupti cum excepturi soluta tempora perspiciatis ipsam quis tempore quisquam ea.',
            'cover' => 'children_3.png'
        ]);
        Book::create([
            'name' => 'Children 04',
            'author' => 'Koontz Gansu',
            'price' => 23000,
            'synopsis' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim corrupti cum excepturi soluta tempora perspiciatis ipsam quis tempore quisquam ea.',
            'cover' => 'children_4.png'
        ]);
        Book::create([
            'name' => 'Children 05',
            'author' => 'Koontz Gansu',
            'price' => 65000,
            'synopsis' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim corrupti cum excepturi soluta tempora perspiciatis ipsam quis tempore quisquam ea.',
            'cover' => 'children_5.png'
        ]);

        Book::create([
            'name' => 'Children 06',
            'author' => 'tree v',
            'price' => 34000,
            'synopsis' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim corrupti cum excepturi soluta tempora perspiciatis ipsam quis tempore quisquam ea.',
            'cover' => 'children_6.png'
        ]);
        Book::create([
            'name' => 'Children 07',
            'author' => 'tree v',
            'price' => 48000,
            'synopsis' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim corrupti cum excepturi soluta tempora perspiciatis ipsam quis tempore quisquam ea.',
            'cover' => 'children_7.png'
        ]);
        Book::create([
            'name' => 'Children 08',
            'author' => 'tree v',
            'price' => 74000,
            'synopsis' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim corrupti cum excepturi soluta tempora perspiciatis ipsam quis tempore quisquam ea.',
            'cover' => 'children_8.png'
        ]);
        Book::create([
            'name' => 'Children 09',
            'author' => 'tree v',
            'price' => 85000,
            'synopsis' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim corrupti cum excepturi soluta tempora perspiciatis ipsam quis tempore quisquam ea.',
            'cover' => 'children_9.png'
        ]);
        Book::create([
            'name' => 'Children 10',
            'author' => 'tree v',
            'price' => 70000,
            'synopsis' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim corrupti cum excepturi soluta tempora perspiciatis ipsam quis tempore quisquam ea.',
            'cover' => 'children_10.png'
        ]);

        ////////////////////////////////////////////////
        Book::create([
            'name' => 'Fiction 1',
            'author' => 'Fajliza Feliza',
            'price' => 70000,
            'synopsis' => 'Necessitatibus ut assumenda commodi corporis nostrum! Fugit, nesciunt ex aperiam similique nihil consectetur necessitatibus magni.',
            'cover' => 'fiction_1.jpg'
        ]);
        Book::create([
            'name' => 'Fiction 2',
            'author' => 'Fajliza Feliza',
            'price' => 89000,
            'synopsis' => 'Necessitatibus ut assumenda commodi corporis nostrum! Fugit, nesciunt ex aperiam similique nihil consectetur necessitatibus magni.',
            'cover' => 'fiction_2.jpg'
        ]);
        Book::create([
            'name' => 'Fiction 3',
            'author' => 'Fajliza Feliza',
            'price' => 77000,
            'synopsis' => 'Necessitatibus ut assumenda commodi corporis nostrum! Fugit, nesciunt ex aperiam similique nihil consectetur necessitatibus magni.',
            'cover' => 'fiction_3.jpg'
        ]);
        Book::create([
            'name' => 'Fiction 4',
            'author' => 'Fajliza Feliza',
            'price' => 67000,
            'synopsis' => 'Necessitatibus ut assumenda commodi corporis nostrum! Fugit, nesciunt ex aperiam similique nihil consectetur necessitatibus magni.',
            'cover' => 'fiction_4.jpg'
        ]);
        Book::create([
            'name' => 'Fiction 5',
            'author' => 'Fajliza Feliza',
            'price' => 56000,
            'synopsis' => 'Necessitatibus ut assumenda commodi corporis nostrum! Fugit, nesciunt ex aperiam similique nihil consectetur necessitatibus magni.',
            'cover' => 'fiction_5.jpg'
        ]);

        Book::create([
            'name' => 'Fiction 6',
            'author' => 'Coconut Song',
            'price' => 35000,
            'synopsis' => 'Necessitatibus ut assumenda commodi corporis nostrum! Fugit, nesciunt ex aperiam similique nihil consectetur necessitatibus magni.',
            'cover' => 'fiction_6.jpg'
        ]);
        Book::create([
            'name' => 'Fiction 7',
            'author' => 'Coconut Song',
            'price' => 39000,
            'synopsis' => 'Necessitatibus ut assumenda commodi corporis nostrum! Fugit, nesciunt ex aperiam similique nihil consectetur necessitatibus magni.',
            'cover' => 'fiction_7.jpg'
        ]);
        Book::create([
            'name' => 'Fiction 8',
            'author' => 'Coconut Song',
            'price' => 44000,
            'synopsis' => 'Necessitatibus ut assumenda commodi corporis nostrum! Fugit, nesciunt ex aperiam similique nihil consectetur necessitatibus magni.',
            'cover' => 'fiction_8.jpg'
        ]);
        Book::create([
            'name' => 'Fiction 9',
            'author' => 'Coconut Song',
            'price' => 58000,
            'synopsis' => 'Necessitatibus ut assumenda commodi corporis nostrum! Fugit, nesciunt ex aperiam similique nihil consectetur necessitatibus magni.',
            'cover' => 'fiction_9.jpg'
        ]);
        Book::create([
            'name' => 'Fiction 10',
            'author' => 'Coconut Song',
            'price' => 80000,
            'synopsis' => 'Necessitatibus ut assumenda commodi corporis nostrum! Fugit, nesciunt ex aperiam similique nihil consectetur necessitatibus magni.',
            'cover' => 'fiction_10.jpg'
        ]);

        ///////////////////////////////////////
        Book::create([
            'name' => 'Top 1',
            'author' => 'Song Voyage',
            'price' => 82000,
            'synopsis' => 'commodi consequatur amet officia enim, ducimus fugiat recusandae est quisquam, eum exercitationem nostrum repudiandae facilis non provident nulla ad, aliquid sed voluptatibus.',
            'cover' => 'top_1.jpg'
        ]);
        Book::create([
            'name' => 'Top 2',
            'author' => 'Song Voyage',
            'price' => 75000,
            'synopsis' => 'commodi consequatur amet officia enim, ducimus fugiat recusandae est quisquam, eum exercitationem nostrum repudiandae facilis non provident nulla ad, aliquid sed voluptatibus.',
            'cover' => 'top_2.jpg'
        ]);
        Book::create([
            'name' => 'Top 3',
            'author' => 'Song Voyage',
            'price' => 79000,
            'synopsis' => 'commodi consequatur amet officia enim, ducimus fugiat recusandae est quisquam, eum exercitationem nostrum repudiandae facilis non provident nulla ad, aliquid sed voluptatibus.',
            'cover' => 'top_3.jpg'
        ]);
        Book::create([
            'name' => 'Top 4',
            'author' => 'Song Voyage',
            'price' => 63000,
            'synopsis' => 'commodi consequatur amet officia enim, ducimus fugiat recusandae est quisquam, eum exercitationem nostrum repudiandae facilis non provident nulla ad, aliquid sed voluptatibus.',
            'cover' => 'top_4.png'
        ]);
        Book::create([
            'name' => 'Top 5',
            'author' => 'Song Voyage',
            'price' => 65000,
            'synopsis' => 'commodi consequatur amet officia enim, ducimus fugiat recusandae est quisquam, eum exercitationem nostrum repudiandae facilis non provident nulla ad, aliquid sed voluptatibus.',
            'cover' => 'top_5.jpg'
        ]);

        Book::create([
            'name' => 'Top 6',
            'author' => 'dreamscape',
            'price' => 89000,
            'synopsis' => 'commodi consequatur amet officia enim, ducimus fugiat recusandae est quisquam, eum exercitationem nostrum repudiandae facilis non provident nulla ad, aliquid sed voluptatibus.',
            'cover' => 'top_6.jpg'
        ]);
        Book::create([
            'name' => 'Top 7',
            'author' => 'dreamscape',
            'price' => 10000,
            'synopsis' => 'commodi consequatur amet officia enim, ducimus fugiat recusandae est quisquam, eum exercitationem nostrum repudiandae facilis non provident nulla ad, aliquid sed voluptatibus.',
            'cover' => 'top_7.jpg'
        ]);
        Book::create([
            'name' => 'Top 8',
            'author' => 'dreamscape',
            'price' => 23000,
            'synopsis' => 'commodi consequatur amet officia enim, ducimus fugiat recusandae est quisquam, eum exercitationem nostrum repudiandae facilis non provident nulla ad, aliquid sed voluptatibus.',
            'cover' => 'top_8.jpg'
        ]);
        Book::create([
            'name' => 'Top 9',
            'author' => 'dreamscape',
            'price' => 56000,
            'synopsis' => 'commodi consequatur amet officia enim, ducimus fugiat recusandae est quisquam, eum exercitationem nostrum repudiandae facilis non provident nulla ad, aliquid sed voluptatibus.',
            'cover' => 'top_9.jpg'
        ]);
        Book::create([
            'name' => 'Top 10',
            'author' => 'dreamscape',
            'price' => 36000,
            'synopsis' => 'commodi consequatur amet officia enim, ducimus fugiat recusandae est quisquam, eum exercitationem nostrum repudiandae facilis non provident nulla ad, aliquid sed voluptatibus.',
            'cover' => 'top_10.jpg'
        ]);
    }
}
