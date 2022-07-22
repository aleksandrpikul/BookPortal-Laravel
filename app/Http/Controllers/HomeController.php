<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    // Homepage (Pagination & Searching)
    public function index()
    {
        $prefix = '';
        if (Auth::user()) {
            $prefix = Auth::user()->role->id === 1 ? '/admin' : '';
        }
        return view('home.index', [
            'books' => Book::latest()->filter(request('search'))->paginate(5)->withQueryString(),
            'prefix' => $prefix
        ]);
    }

    // Book detail (Member & Guest)
    public function show(Book $book, Request $request)
    {
        $items = $request->session()->get('items');
        if ($items) {
            foreach ($items as $item) {
                if ($item->id === $book->id) {
                    $book->quantity = $item->quantity;
                } else {
                    $book->quantity = 0;
                }
            }
        }

        return view('home.book_detail', [
            'book' => $book
        ]);
    }
}
