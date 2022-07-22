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
            return back()->with('successMessage', 'Insert Book Success');
        }
        return back()->with('errorMessage', 'Insert Book Failed');

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
            return redirect('/admin/book')->with('successMessage', 'Book Update Successfully');
        }
        return back()->with('errorMessage', 'Book Update Failed');
    }

    public function deleteBook(Book $book): RedirectResponse
    {
        $bookId = $book['id'];
        $cover = $book['cover'];
        if ($book->delete()) {
            File::delete(public_path('books/'.$cover));
            BookGenre::where('book_id', $bookId)->delete();
            return back()->with('successMessage', 'Book Deleted Successfully');
        }
        return back()->with('errorMessage', 'Book Delete Failed');
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
            return back()->with('successMessage', 'Genre Added Successfully');
        }
        return back()->with('errorMessage', 'Genre Add Failed');
    }

    // Handle Update Genre
    public function updateGenre(Genre $genre, Request $req): RedirectResponse
    {
        $validatedData = $req->validate([
            'name' => 'required|unique:genres'
        ]);

        $genre->name = $validatedData['name'];
        if ($genre->save()) {
            return back()->with('successMessage', 'Genre Updated Successfully');
        }
        return back()->with('errorMessage', 'Genre Update Failed');
    }

    // Handle Delete Genre
    public function deleteGenre(Genre $genre)
    {
        if ($genre->delete()) {
            return redirect('/admin/genre')->with('successMessage', 'Genre Deleted Successfully');
        }
        return back()->with('errorMessage', 'Genre Delete Failed');
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
            return back()->with('successMessage', 'User Updated Successfully');
        }
        return back()->with('errorMessage', 'User Update Failed');
    }

    // Handle Delete User
    public function deleteUser(User $user)
    {
        if ($user->delete()) {
            return redirect('/admin/user')->with('successMessage', 'User Deleted Successfully');
        }
        return back()->with('errorMessage', 'User Delete Failed');
    }
}
