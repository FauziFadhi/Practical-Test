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
    return view('layout');
});
Route::resource('deposits', 'DepositController');
Route::resource('transaction', 'TransactionController');

Route::post('withdraw','TransactionController@withdraw');

route::get('/withdraw',function (){
    $users = \App\User::orderBy('name')->get();

    return view('deposit.withdraw', compact('users'));
})->name('withdraw');
