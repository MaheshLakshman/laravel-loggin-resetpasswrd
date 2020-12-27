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

Route::get('/',function() {
    return view('welcome');
});

Auth::routes();
//Route::resource('hom','HomeController');
Route::get('/home','HomeController@index')->name('home');
Route::post('/author/create','HomeController@store')->name('formstore');
Route::get('/author/list','HomeController@list')->name('formlist');
Route::get('/author/delete/{id}','HomeController@destroy')->name('deleteemployee');
Route::get('/author/show/{id}','HomeController@show')->name('showemployee');
Route::get('/author/edit/{id}','HomeController@edit')->name('editemployee');
Route::post('/update/{id}','HomeController@update')->name('modify');
