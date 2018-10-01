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
Auth::routes();

Route::get('/', 'PagesController@home')->name('home');
Route::get('/g/', function (Request $request) {
    return view('guild.info');
})->name('guild.home');
Route::get('/g/info', function (Request $request) {
    return view('guild.info');
})->name('guild.info');
Route::get('/g/roster/', 'PagesController@roster')->name('guild.roster');
Route::get('/g/squads/', 'PagesController@squads')->name('guild.squads');
Route::post('/g/squads/', 'PagesController@squads');
Route::get('/g/{id}/roster/', 'PagesController@roster');
Route::get('/g/{id}/squads/', 'PagesController@squads');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
