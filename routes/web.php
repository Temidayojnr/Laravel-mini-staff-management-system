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
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', ['uses'=> 'HomeController@index', 'as'=>'home']);

Route::get('/home', ['uses'=> 'HomeController@index', 'as'=>'home']);

Route::get('/new', ['uses' => 'HomeController@employee', 'as'=>'new']);

Route::post('/store', 'HomeController@store')->name('views.store');

Route::get('/sfaffer/{id}', ['uses'=> 'HomeController@show', 'as'=>'sfaffer']);

Route::put('update/{id}', ['uses'=>'HomeController@update', 'as'=>'views.update']);

Route::get('ender/{id}', ['uses'=> 'HomeController@ender', 'as'=>'ender']);

