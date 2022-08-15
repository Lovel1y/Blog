<?php

use Illuminate\Support\Facades\Route;

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

//Route::resource('post',\App\Http\Controllers\Main\MainController::class);


Route::get('/','\App\Http\Controllers\Main\MainController@index')->name('main');
Route::get('/admin', '\App\Http\Controllers\Admin\Main\AdminController@index')->name('admin');

Route::group(['middleware' => ['auth','admin', 'verified']],function(){
    Route::resource('admin/categories',\App\Http\Controllers\Admin\Category\CategoryController::class)->names('admin.category');
    Route::get('admin/category/restore','\App\Http\Controllers\Admin\Category\CategoryController@restore')->name('admin.category.restore');
    Route::patch('admin/categories','\App\Http\Controllers\Admin\Category\CategoryController@restorestore')->name('admin.category.restore.store');

    Route::resource('admin/tags',\App\Http\Controllers\Admin\Tag\TagController::class)->names('admin.tag');
    Route::get('admin/tag/restore','\App\Http\Controllers\Admin\Tag\TagController@restore')->name('admin.tag.restore');
    Route::patch('admin/tags','\App\Http\Controllers\Admin\Tag\TagController@restorestore')->name('admin.tag.restore.store');

    Route::resource('admin/posts', \App\Http\Controllers\Admin\Post\PostController::class )->names('admin.post');
    Route::get('admin/post/restore','\App\Http\Controllers\Admin\Post\PostController@restore')->name('admin.post.restore');
    Route::patch('admin/posts','\App\Http\Controllers\Admin\Post\PostController@restorestore')->name('admin.post.restore.store');

    Route::resource('admin/users', \App\Http\Controllers\Admin\User\UserController::class)->names('admin.user');
    Route::get('admin/user/restore', '\App\Http\Controllers\Admin\User\UserController@restore')->name('admin.user.restore');
    Route::patch('admin/users', '\App\Http\Controllers\Admin\User\UserController@restorestore')->name('admin.user.restore.store');
});

//Route::resource('admin/categories',\App\Http\Controllers\Admin\Category\CategoryController::class)->names('admin.category');
//Route::get('admin/category/restore','\App\Http\Controllers\Admin\Category\CategoryController@restore')->name('admin.category.restore');
//Route::patch('admin/categories','\App\Http\Controllers\Admin\Category\CategoryController@restorestore')->name('admin.category.restore.store');
//
//Route::resource('admin/tags',\App\Http\Controllers\Admin\Tag\TagController::class)->names('admin.tag');
//Route::get('admin/tag/restore','\App\Http\Controllers\Admin\Tag\TagController@restore')->name('admin.tag.restore');
//Route::patch('admin/tags','\App\Http\Controllers\Admin\Tag\TagController@restorestore')->name('admin.tag.restore.store');
//
//Route::resource('admin/posts', \App\Http\Controllers\Admin\Post\PostController::class )->names('admin.post');
//Route::get('admin/post/restore','\App\Http\Controllers\Admin\Post\PostController@restore')->name('admin.post.restore');
//Route::patch('admin/posts','\App\Http\Controllers\Admin\Post\PostController@restorestore')->name('admin.post.restore.store');
//
//Route::resource('admin/users', \App\Http\Controllers\Admin\User\UserController::class)->names('admin.user');
//Route::get('admin/user/restore', '\App\Http\Controllers\Admin\User\UserController@restore')->name('admin.user.restore');
//Route::patch('admin/users', '\App\Http\Controllers\Admin\User\UserController@restorestore')->name('admin.user.restore.store');





Auth::routes(['verify' => true]);
