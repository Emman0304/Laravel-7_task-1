<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
// use App\Http\Controllers\ProductsController;

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
    return view('loginForm.signin');
});

Route::resource('products','ProductsController');

Route::get('/signup','authController@signUp')->name('signup');
Route::get('/signin','authController@signin')->name('signin');
Route::get('/index','ProductsController@index')->name('index');

Route::post('/register','authController@store')->name('store');

Route::get('/posts','authController@login')->name('login');
Route::post('/posts','authController@login')->name('login'); 

// Route::get('/import-form','ProductsController@importForm');
Route::post('students/import','ProductsController@import')->name('import');
Route::get('students/export','ProductsController@export')->name('export');



