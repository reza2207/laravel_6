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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'PostnoteController@index');
//Route::get('/', 'HomeController@index')->name('home');
Route::get('/', 'PostnoteController@index');
Route::get('/profile/{id}', 'ProfileController@profile')->name('profile');
Route::get('/market-place', 'MarketController@index');
Route::get('/post-note', 'PostnoteController@index');


//Route::get('/summernote','summernote');
//summernote store route
Route::post('/post-note/store','PostnoteController@store')->name('summernotePersist');

Route::get('/post-note/store', 'PostnoteController@index');
//summernote display route
//Route::get('/summernote','SummernoteController@index')->name('summernoteDispay');

/*Route::get('profile/{id}', function ($id) {
    return 'User '.$id;
});*/

//Route::get('/', 'ImportController@getImport')->name('import');
//Route::post('/import_parse', 'ImportController@parseImport')->name('import_parse');
//Route::post('/import_process', 'ImportController@processImport')->name('import_process');
