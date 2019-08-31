<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('/posts', 'PostController@index');
// Route::post('/posts', 'PostController@store');
// Route::get('/posts/{id}', 'PostController@show');
// Route::patch('/posts/{id}', 'PostController@update');
// Route::delete('/posts/{id}', 'PostController@delete');

Route::post('signup', 'AuthController@signup');
Route::post('login', 'AuthController@login');
// Route::resource('posts', 'PostController' , [
//     'except' => 'delete', 'store', 'update',
// ]);
// Route::resource('posts', 'PostController' , [
//     'only' => 'delete', 'store', 'update',
// ])->middleware(['auth:api']);
Route::resource('posts', 'PostController');
