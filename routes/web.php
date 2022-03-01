<?php

use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/test', [TestController::class, 'testRoute']);
Route::post('/storePost', [TestController::class, 'storePost'])->name('storePostRoute');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
