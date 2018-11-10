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

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('/generator', 'NameController@index');
Route::get('/generator', 'NameController@generate');
Route::get('/names/search-process', 'NameController@searchProcess');

//Route::get('/books', function () {
//    return 'Here are all the books...';
//});
//
//Route::get('/practice', function () {
//    dump(config('mail.driver'));
//});


Route::get('/', 'WelcomeController');

Route::view('/about', 'about');
Route::view('/contact', 'contact');

