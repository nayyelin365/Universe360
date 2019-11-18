<?php
 
Route::get('/', function () {
    return view('addlanguage');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/lang', 'LanguagesController@index');

//Ajax for public access
Route::post('set-lang-public-access','LanguagesController@setPublicAccess');

Route::post('unset-lang-public-access','LanguagesController@unsetPublicAccess');

Route::post('description/update','LanguageKeysController@store');
Route::post('language/store','LanguagesController@store'); 
Route::post('language_key/store/test','KeysController@store');