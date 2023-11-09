<?php

use Illuminate\Support\Facades\Route;

Route::get('', 'App\Http\Controllers\Admin\HomeController@index')->middleware('can:admin.home')->name('admin.home');

Route::resource('users', 'App\Http\Controllers\Admin\UserController')->only(['index', 'edit', 'update'])->names('admin.users');

Route::resource('categories', 'App\Http\Controllers\Admin\CategoryController')->except('show')->names('admin.categories');

Route::resource('tags', 'App\Http\Controllers\Admin\TagController')->except('show')->names('admin.tags');

Route::resource('posts', 'App\Http\Controllers\Admin\PostController')->names('admin.posts');
?>