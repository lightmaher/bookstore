<?php

use Illuminate\Support\Facades\Route;

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
route::group(['middleware' => 'auth'], function(){
    route::get('/home',function(){
        return view('home');
    })->name('home');
    route::get('/',function(){
        return view('welcome');
    })->name('welcome');
});

Auth::routes();
Route::resource('books','BooksController');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/addtocart/{book}', 'BooksController@AddtoCart')->name('cart.add');
