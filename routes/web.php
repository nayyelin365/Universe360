<?php
 
Route::get('/', 'LanguagesController@index')->middleware('auth');

Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/lang', 'LanguagesController@index')->middleware('auth');


//Ajax for public access
Route::post('set-lang-public-access','LanguagesController@setPublicAccess');

Route::post('unset-lang-public-access','LanguagesController@unsetPublicAccess');

Route::post('description/update','LanguageKeysController@store');
Route::post('language/store','LanguagesController@store'); 
Route::post('language_key/store','KeysController@store');

Route::post('language_update','LanguagesController@update');
Route::post('language_delete','LanguagesController@destroy');

Route::post('key_update','KeysController@update');
Route::post('key_delete','KeysController@destroy');