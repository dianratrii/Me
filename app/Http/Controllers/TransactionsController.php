<?php

namespace App\Http\Controllers;

use App\Category;
use App\Transaction;
use App\Http\Requests\TransactionRequest;
use Illuminate\Http\Request;
use Session;
use Auth;

class TransactionsController extends Controller
{
  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index(Request $request)
  {
      $transactions = Transaction::where('user_id', Auth::user()->id)->get();

      $income = Transaction::income();
      $expense = Transaction::expense();
      $balance = $income - $expense;

      return view('transactions/index', compact('transactions', 'balance'));
  }

  public function create()
  {
      $categories = Category::all();

      return view('transactions/form', compact('categories'));
  }

  public function store(TransactionRequest $request)
  {
      $transaction = new Transaction($request->only('name', 'transaction_type', 'amount', 'description'));
      $transaction->category()->associate($request->category_id);
      $transaction->user()->associate(Auth::user()->id);
      $transaction->save();

      Session::flash('success','Successfully created transaction data');

      return redirect()->route('transactions.index');
  }

  public function edit(Request $request)
  {
      $categories = Category::all();
      $transaction = Transaction::find($request->id);

      return view('transactions/form', compact('categories', 'transaction'));
  }

  public function update(TransactionRequest $request)
  {
      $transaction = Transaction::find($request->id);
      $transaction->fill($request->only('name', 'transaction_type', 'amount', 'description'));
      $transaction->category()->associate($request->category_id);
      $transaction->user()->associate(Auth::user()->id);
      $transaction->save();

      Session::flash('success','Successfully updated transaction data');

      return redirect()->route('transactions.index');
  }

  public function delete(Request $request, Transaction $transaction)
  {
      $transaction = Transaction::find($request->id);
      $transaction->delete();

      return redirect()->route('transactions.index');
  }
}
