<?php

use App\Http\Controllers\DynamicController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'home';
});

Route::get('/test', [TestController::class, 'testRoute']);
Route::post('/storePost', [TestController::class, 'storePost'])->name('storePostRoute');

Route::get('/post/{id}/like', [PostController::class, 'toggleLike'])->middleware('auth')->name('post.like');
Route::get('/post/{post}/delete', [PostController::class, 'destroy'])->middleware('auth')->name('post.destroy');

Route::get('/upload', [TestController::class, 'uploadForm']);
Route::post('/handleUpload', [TestController::class, 'handleUpload'])->name('handleUpload');

Route::get('/dynamic/{route}', [DynamicController::class, 'boot']);

//Route::middleware('setLocale')->name('post.')->prefix('/posts')->controller(TestController::class)->group(function () {
//
//    Route::get('/create', 'testRoute')->name( 'create');
//    Route::post('/store', 'testRoute')->name('store');
//    Route::get('/edit', 'testRoute')->name('edit');
//
//});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
