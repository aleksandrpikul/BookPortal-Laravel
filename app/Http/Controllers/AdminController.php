<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookGenre;
use App\Models\User;
use App\Models\Genre;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function manageBook()
    {
        return view('admin.manage_book', [
            'books' => Book::orderBy('updated_at','desc')->get(),
            'genres' => Genre::all()
        ]);
    }
    public function insertBook(Request $req): RedirectResponse
    {

        $req->validate([
            'name' => ['required', 'string', 'max:250'],
            'author' => ['required', 'string', 'max:250'],
            'synopsis' => ['required', 'string',],
            'price' => ['required', 'numeric', 'min:0', 'max:100000'],
            'genres' => ['required', 'string'],
            'cover' => ['required', 'mimes:jpg,png,jpeg', 'max:5048']
        ]);
        $coverName = '';
        if($req->file('cover')){
            $coverName = time().'_'.$req->file('cover')->getClientOriginalName();
        }

        $respond = Book::query()->create([
            'name' => $req['name'],
            'author' => $req['author'],
            'synopsis' => $req['synopsis'],
            'price' => $req['price'],
            'cover' => $coverName
        ]);

        $genres = explode('_',$req['genres']);
        foreach ($genres as $genre){
            BookGenre::create([
                'book_id' => $respond->id,
                'genre_id' => $genre
            ]);
        }

        if ($respond){
            $req->file('cover')->move(public_path('books'), $coverName);
            return back()->with('successMessage', 'Книга добавлена успешно');
        }
        return back()->with('errorMessage', 'Книга добавлена успешно');

    }
    public function bookDetail(Book $book)
    {
        return view('admin.book_detail', [
            'book' => $book,
            'genres' => Genre::all()
        ]);
    }
    public function updateBook(Book $book, Request $req): RedirectResponse
    {

        $req->validate([
            'name' => ['required', 'string', 'max:250'],
            'author' => ['required', 'string', 'max:250'],
            'synopsis' => ['required', 'string'],
            'price' => ['required', 'numeric', 'min:0', 'max:100000'],
            'genres' => ['required', 'string'],
            'cover' => ['mimes:jpg,png,jpeg', 'max:5048']
        ]);
        $coverName = $req['oldCover'];
        if($req->file('cover')){
            $coverName = time().'_'.$req->file('cover')->getClientOriginalName();
            $req->file('cover')->move(public_path('books'), $coverName);
            File::delete(public_path('books/'.$req['oldCover']));
        }

        $genres = explode('_',$req['genres']);
        BookGenre::where('book_id', $book->id)->delete();
        foreach ($genres as $genre){
            BookGenre::create([
                'book_id' => $book->id,
                'genre_id' => $genre
            ]);
        }

        $book->name = $req['name'];
        $book->author = $req['author'];
        $book->price = $req['price'];
        $book->synopsis = $req['synopsis'];
        $book->cover = $coverName;

        if ($book->save()) {
            return redirect('/admin/book')->with('successMessage', 'Обновление книги прошло успешно');
        }
        return back()->with('errorMessage', 'Обновление книги не удалось');
    }

    public function deleteBook(Book $book): RedirectResponse
    {
        $bookId = $book['id'];
        $cover = $book['cover'];
        if ($book->delete()) {
            File::delete(public_path('books/'.$cover));
            BookGenre::where('book_id', $bookId)->delete();
            return back()->with('successMessage', 'Книга успешно удалена');
        }
        return back()->with('errorMessage', 'Удаление книги не удалось');
    }

    // Manage Genre Page
    public function manageGenre()
    {
        return view('admin.manage_genre', [
            'genres' => Genre::all()
        ]);
    }

    // Genre Detail Page
    public function genreDetail(Genre $genre)
    {
        return view('admin.genre_detail', [
            'genre' => $genre,
            'books' => $genre->books
        ]);
    }

    // Handle Add Genre
    public function addGenre(Request $req): RedirectResponse
    {
        $validatedData = $req->validate([
            'name' => 'required|unique:genres'
        ]);

        if (Genre::create($validatedData)) {
            return back()->with('successMessage', 'Жанр добавлен успешно');
        }
        return back()->with('errorMessage', 'Добавление жанра не удалось');
    }

    // Handle Update Genre
    public function updateGenre(Genre $genre, Request $req): RedirectResponse
    {
        $validatedData = $req->validate([
            'name' => 'required|unique:genres'
        ]);

        $genre->name = $validatedData['name'];
        if ($genre->save()) {
            return back()->with('successMessage', 'Жанр успешно обновлен');
        }
        return back()->with('errorMessage', 'Обновление жанра не удалось');
    }

    // Handle Delete Genre
    public function deleteGenre(Genre $genre)
    {
        if ($genre->delete()) {
            return redirect('/admin/genre')->with('successMessage', 'Жанр успешно удален');
        }
        return back()->with('errorMessage', 'Удаление жанра не удалось');
    }

    // Manage User Page
    public function manageUser()
    {
        return view('admin.manage_user', [
            'users' => User::all()
        ]);
    }

    // User Detail Page
    public function userDetail(User $user)
    {
        return view('admin.user_detail', [
            'user' => $user
        ]);
    }

    // Handle Update User
    public function updateUser(User $user, Request $req): RedirectResponse
    {
        $validatedData = $req->validate([
            'name' => 'required',
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'role' => 'required'
        ]);

        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->role_id = $validatedData['role'] === 'Admin' ? 1 : 2;
        if ($user->save()) {
            return back()->with('successMessage', 'Пользователь успешно обновлен');
        }
        return back()->with('errorMessage', 'Обновление пользователя не удалось');
    }

    // Handle Delete User
    public function deleteUser(User $user)
    {
        if ($user->delete()) {
            return redirect('/admin/user')->with('successMessage', 'Пользователь успешно удален');
        }
        return back()->with('errorMessage', 'Удаление пользователя не удалось');
    }
}
