<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

// Route::resource('products','ProductsController');

//get
Route::get('/index','HomeController@indexTable')->name('index');
Route::get('/create','HomeController@create')->name('create');
Route::get('/edit/student/{id}','HomeController@edit')->name('edit'); 
Route::get('/delete/student/{id}','HomeController@destroy')->name('destroy'); 

//post
Route::post('/update/student/{id}','HomeController@update')->name('update'); 
Route::post('/destroy','HomeController@destroy')->name('destroy');
Route::post('/store','HomeController@store')->name('store');
Route::post('students/import','HomeController@import')->name('import');

//get
Route::get('students/export','HomeController@export')->name('export');
Route::get('generate-pdf','HomeController@generatePDF')->name('pdf');
Route::get('/table','HomeController@display')->name('table');

//Auth
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
