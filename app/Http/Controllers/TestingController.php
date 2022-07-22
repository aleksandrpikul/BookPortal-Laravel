<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Receipt;
use App\Models\Role;
use App\Models\User;
use App\Models\Genre;
use App\Models\Transaction;

class TestingController extends Controller
{
    public function loopTesting()
    {
        $genre = [1,2,3,4,5,6,7,8,9,10,11,12,13];
        $b = array_rand($genre, 6);
        foreach ($b as $a) echo $a.' ';
    }
    public function modelTesting()
    {
        return view('testing.model_testing', [
            'transactions' => Transaction::all(),
            'receipts' => Receipt::all(),
            'roles' => Role::all(),
            'users' => User::all(),
            'genres' => Genre::all(),
            'books' => Book::all()
        ]);
    }

    public function controllerTesting(){
        $receipt = Receipt::find(1);
        $transactions = $receipt->transactions;
        return view('testing.controller_testing',[
            'receipt' => $receipt,
            'transactions' => $transactions
        ]);
    }
}
