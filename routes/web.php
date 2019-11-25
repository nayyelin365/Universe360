<?php

Route::get('application',function(){
	return view('choose_application');
});
 
Route::get('/', 'LanguagesController@index')->middleware('auth');

Route::get('/change_language','LanguagesController@changeLanguage')->middleware('auth');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/lang', 'LanguagesController@index')->middleware('auth')->name('lang');

//Ajax for public access
Route::post('set-lang-public-access','LanguagesController@setPublicAccess');
Route::post('unset-lang-public-access','LanguagesController@unsetPublicAccess');
//language
Route::post('language/store','LanguagesController@store'); 
Route::post('language_update','LanguagesController@update');
Route::post('language_delete','LanguagesController@destroy');
Route::get('language_delete/{id}','LanguagesController@delete');

//key
Route::post('language_key/store','KeysController@store');
Route::post('key_update','KeysController@update');
Route::post('key_delete','KeysController@destroy');
Route::get('key_delete/{id}','KeysController@delete');

//key value
Route::post('description/update','LanguageKeysController@store');

//test
Route::get('app','AppController@index');
Route::get('language','LanguageController@index');
Route::get('app_language/{id}','AppLanguageController@index');
Route::get('app_language_key','AppLanguageKeyController@index');


