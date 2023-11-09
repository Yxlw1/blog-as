<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\blogController;

Route::get('/', 'App\Http\Controllers\PostController@index')->name('index');
Route::get('posts/{post}', 'App\Http\Controllers\PostController@show')->name('post.show');
 
// // Route::get('/', [blogController::class, 'index']);

Route::get('/category/{category}', 'App\Http\Controllers\PostController@category')->name('post.category');
Route::get('tag/{tag}', 'App\Http\Controllers\PostController@tag')->name('post.tag');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
