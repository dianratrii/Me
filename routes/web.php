<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/categories', 'CategoriesController@index')->name('categories.index');
Route::get('/categories/create', 'CategoriesController@create')->name('categories.create');
Route::post('/categories/store', 'CategoriesController@store')->name('categories.store');
Route::get('/categories/{id}/edit', 'CategoriesController@edit')->name('categories.edit');
Route::post('/categories/{id}/update', 'CategoriesController@update')->name('categories.update');
Route::get('/categories/{id}/destroy', 'CategoriesController@delete')->name('categories.destroy');

Route::get('/transactions', 'TransactionsController@index')->name('transactions.index');
Route::get('/transactions/create', 'TransactionsController@create')->name('transactions.create');
Route::post('/transactions/store', 'TransactionsController@store')->name('transactions.store');
Route::get('/transactions/{id}/edit', 'TransactionsController@edit')->name('transactions.edit');
Route::post('/transactions/{id}/update', 'TransactionsController@update')->name('transactions.update');
Route::get('/transactions/{id}/destroy', 'TransactionsController@delete')->name('transactions.destroy');