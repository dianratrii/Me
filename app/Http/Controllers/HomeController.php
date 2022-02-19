<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $income = Transaction::income();
        $expense = Transaction::expense();
        $balance = $income - $expense;

        return view('index', compact('income', 'expense', 'balance'));
    }
}
