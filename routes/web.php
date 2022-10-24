<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

// use App\Http\Controllers\PDFexportCon;
// use App\Http\Controllers\authController;
// use App\Http\Controllers\tableController;
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
    
    return view('welcome');
});

Route::resource('products','ProductsController');


Route::get('/signup','HomeController@signUp')->name('signup');
Route::get('/signin','HomeController@signin')->name('signin');
Route::get('/index','HomeController@indexTable')->name('index');
Route::post('/register','HomeController@storeSignup')->name('store');
Route::get('/posts','HomeController@login')->name('login');
Route::post('/posts','HomeController@login')->name('login'); 
Route::post('students/import','HomeController@import')->name('import');
Route::get('students/export','HomeController@export')->name('export');
Route::get('generate-pdf','HomeController@generatePDF')->name('pdf');
Route::get('/table','HomeController@display')->name('table');







Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
