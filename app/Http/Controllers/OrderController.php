<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Receipt;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // View Cart
    public function index(Request $request)
    {
        return view('order.cart', [
            'items' => $request->session()->get('items')
        ]);
    }

    // Handle add & update/edit cart item
    public function update(Request $request, Book $book)
    {
        $action = 'add';
        $quantity = $request->get('quantity');

        $book->quantity = $quantity;
        $book->subtotal = $book->price * $quantity;

        $items = $request->session()->get('items');
        if ($items) {
            foreach ($items as &$item) {
                if ($item->id === $book->id) {
                    $action = 'update';
                    $item = $book;
                }
            }
        } else {
            $items = [];
        }

        if ($action === 'add') {
            array_push($items, $book);
        }

        $request->session()->put('items', $items);
        return redirect('/cart')->with('successMessage', 'Обновление прошло успешно');
    }

    // Handle delete/remove cart item
    public function destroy(Request $request, Book $book)
    {
        $items = $request->session()->get('items');
        $i = 0;
        foreach ($items as $item) {
            if ($item->id === $book->id) {
                unset($items[$i]);
                $items = array_values($items);
            }
            $i++;
        }

        $request->session()->put('items', $items);
        return redirect('/cart')->with('successMessage', 'Обновление прошло успешно');
    }

    // Checkout cart to complete transaction
    public function store(Request $request)
    {
        $receiptData = [
            'user_id' => Auth::user()->id,
            'date' => Carbon::now()->toDateTimeString()
        ];
        $receipt = Receipt::create($receiptData);

        $items = $request->session()->get('items');
        foreach ($items as $book) {
            $transactionData = [
                'receipt_id' => $receipt->id,
                'book_id' => $book->id,
                'price' => $book->price,
                'quantity' => $book->quantity
            ];
            Transaction::create($transactionData);
        }

        $request->session()->forget('items');

        return redirect('/history')->with('successMessage', 'История обновлена успешно');
    }

    // View Transaction History
    public function create()
    {
        return view('order.history', [
            'receipts' => Receipt::where('user_id', Auth::user()->id)->get()
        ]);
    }

    // View Transaction History Detail
    public function show(Receipt $receipt)
    {
        $transactions = $receipt->transactions;
        return view('order.history_detail', [
            'transactions' => $transactions
        ]);
    }
}
