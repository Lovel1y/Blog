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


Route::get('/', '\App\Http\Controllers\Main\MainController@index')->name('main.index');

Route::resource('/posts', \App\Http\Controllers\Post\PostController::class)->names('post');

Route::post('/posts/{post}/comments', \App\Http\Controllers\Post\Comment\StoreController::class)->name('post.comment.store');
Route::post('/posts/{post}/likes', \App\Http\Controllers\Post\Like\StoreController::class)->name('post.like.store');
Route::get('/categories', \App\Http\Controllers\Category\IndexController::class)->name('category.index');
Route::get('/categories/{category}/posts', \App\Http\Controllers\Category\Post\IndexController::class)->name('category.post.index');

Route::group(['prefix' => 'personal', 'middleware' => ['auth', 'verified']], function () {
    Route::get('/', 'App\Http\Controllers\Personal\Main\PersonalController@index')->name('personal.main.index');


    Route::group(['prefix' => 'liked'], function () {
        Route::get('/', 'App\Http\Controllers\Personal\Liked\LikeController@index')->name('personal.liked.index');
        Route::delete('/{post}', 'App\Http\Controllers\Personal\Liked\LikeController@delete')->name('personal.liked.delete');
    });

    Route::resource('/comment', \App\Http\Controllers\Personal\Comment\CommentController::class)->names('personal.comment');

});


Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin', 'verified']], function () {
    Route::get('/', '\App\Http\Controllers\Admin\Main\AdminController@index')->name('admin.main.index');

    Route::resource('/categories', \App\Http\Controllers\Admin\Category\CategoryController::class)->names('admin.category');
    Route::get('/category/restore', '\App\Http\Controllers\Admin\Category\CategoryController@restore')->name('admin.category.restore');
    Route::patch('/categories', '\App\Http\Controllers\Admin\Category\CategoryController@restorestore')->name('admin.category.restore.store');

    Route::resource('/tags', \App\Http\Controllers\Admin\Tag\TagController::class)->names('admin.tag');
    Route::get('/tag/restore', '\App\Http\Controllers\Admin\Tag\TagController@restore')->name('admin.tag.restore');
    Route::patch('/tags', '\App\Http\Controllers\Admin\Tag\TagController@restorestore')->name('admin.tag.restore.store');

    Route::resource('/posts', \App\Http\Controllers\Admin\Post\PostController::class)->names('admin.post');
    Route::get('/post/restore', '\App\Http\Controllers\Admin\Post\PostController@restore')->name('admin.post.restore');
    Route::patch('/posts', '\App\Http\Controllers\Admin\Post\PostController@restorestore')->name('admin.post.restore.store');

    Route::resource('/users', \App\Http\Controllers\Admin\User\UserController::class)->names('admin.user');
    Route::get('/user/restore', '\App\Http\Controllers\Admin\User\UserController@restore')->name('admin.user.restore');
    Route::patch('/users', '\App\Http\Controllers\Admin\User\UserController@restorestore')->name('admin.user.restore.store');
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
