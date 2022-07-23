<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookGenre;
use App\Models\Receipt;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class ForRestAPIController extends Controller
{
    // Получение списка книг с именем автора
    public function BooksAndAuthors() {
        return Book::query()
            ->select('name', 'author')
            ->orderBy('id', 'ASC')
            ->paginate(13);
    }

    // Получение описания книг с названием
    public function BooksSynopsis() {
        return Book::query()
            ->select('synopsis', 'name')
            ->orderBy('id', 'ASC')
            ->paginate(13);
    }

    // Получение списка авторов
    public function Authors() {
        return Book::query()
            ->select('author')
            ->orderBy('id', 'ASC')
            ->paginate(13);
    }

    // Получение списка пользователей
    public function Users() {
        return User::query()
            ->select('name')
            ->paginate(3);
    }
}
