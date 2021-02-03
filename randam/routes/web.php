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
Route::get('shushoku-index', 'ShushokusController@index')->name('shushoku-index');
Route::get('shushoku-create', 'ShushokusController@create')->name('shushoku-create');
Route::post('shushoku-store', 'ShushokusController@store')->name('shushoku-store');
Route::get('shushoku/{id}/edit', 'ShushokusController@edit')->name('shushoku-edit');
Route::put('shushoku/{id}', 'ShushokusController@update')->name('shushoku-update');
Route::delete('shushoku/{id}', 'ShushokusController@destroy')->name('shushoku-delete');

Route::get('fukushoku-index', 'FukushokusController@index')->name('fukushoku-index');
Route::get('fukushoku-create', 'FukushokusController@create')->name('fukushoku-create');
Route::post('fukushoku-store', 'FukushokusController@store')->name('fukushoku-store');
Route::get('fukushoku/{id}/edit', 'FukushokusController@edit')->name('fukushoku-edit');
Route::put('fukushoku/{id}', 'FukushokusController@update')->name('fukushoku-update');
Route::delete('fukushoku/{id}', 'FukushokusController@destroy')->name('fukushoku-delete');

Route::get('sirumono-index', 'SirumonosController@index')->name('sirumono-index');
Route::get('sirumono-create', 'SirumonosController@create')->name('sirumono-create');
Route::post('sirumono-store', 'SirumonosController@store')->name('sirumono-store');
Route::get('sirumono/{id}/edit', 'SirumonosController@edit')->name('sirumono-edit');
Route::put('sirumono/{id}', 'SirumonosController@update')->name('sirumono-update');
Route::delete('sirumono/{id}', 'SirumonosController@destroy')->name('sirumono-delete');


