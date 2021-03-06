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

// Route::get('/', function () {
//     return view('welcome');
// });

/*
Route::get('/hello', function () {
    return 'Hello Linh Nguyen';
});

Route::get('user/{id}/{name}', function ($id, $name) {
    return 'User '.$id.' with name is '.$name;
});
*/

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');

// Route::group(['middleware' => ['web']], function () {
//     Route::resource('posts', 'PostsController');
// });

Route::resource('posts', 'PostsController', [
    'except' => [
        'show'
    ]
]);
Route::get('posts/{url}', 'PostsController@show');

Route::resource('categories', 'CategoriesController');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
Route::get('/slug', 'SlugController@index');
