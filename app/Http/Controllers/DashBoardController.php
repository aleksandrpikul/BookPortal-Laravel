<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookGenre;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class DashBoardController extends Controller
{
    public function Books() {
        return Book::query()
            ->orderBy('name', 'ASC')
            ->orderBy('author', 'ASC')
            ->paginate(13);
    }

    public function User() {
        return User::query()
            ->orderBy('name', 'ASC')
            ->orderBy('id', 'ASC')
            ->paginate(6);
    }

    public function BookGenres() {
        return BookGenre::query()
            ->orderBy('book_id', 'ASC')
            ->orderBy('genre_id', 'ASC')
            ->paginate(6);
    }
}
