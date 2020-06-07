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

Route::get('/add', function () {
    return view('welcome');
});

Route::post('/fileuploads', 'FileController@uploadFile');
Route::post('/getfiles', 'FileController@getFiles');
Route::post('/delete', 'FileController@delete');


Route::get('/', 'MainController@getlending');
Route::get('/test', 'TestController@test');

Route::get('/gettext', 'MainController@getText');
// Route::post('/checkTask', 'ApiAppController@checkTask');
