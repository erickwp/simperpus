<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return view
     */
    public function borrow()
    {
        return view('transactions.borrow.index');
    }

    /**
     * @return view
     */
    public function return()
    {
        return view('transactions.return.index');
    }
}
