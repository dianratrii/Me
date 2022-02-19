<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\User;
use Auth;

class Transaction extends Model
{
    protected $fillable = [
    	'user_id', 
    	'transaction_type', 
    	'category_id', 
    	'amount', 
    	'description'
    ];

    public function category() 
    {
    	return $this->belongsTo(Category::class, 'category_id');
    }

    public function user() 
    {
    	return $this->belongsTo(User::class, 'user_id');	
    }

    public static function income()
    {
        return self::where('user_id', Auth::user()->id)->where('transaction_type', '=', "income")->sum('amount');
    }

    public static function expense()
    {
        return self::where('user_id', Auth::user()->id)->where('transaction_type', '=', "expense")->sum('amount');
    }
}
