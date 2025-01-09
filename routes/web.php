<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
use App\Http\Controllers\PostController;
use App\Http\Controllers\FileEditorController;

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/post/{year}/{month}/{day}/{slug}', [PostController::class, 'show'])->name('posts.show');


Route::get('/editor', [FileEditorController::class, 'show'])->name('editor.show');
Route::post('/editor', [FileEditorController::class, 'update'])->name('editor.update');

Route::get('/', function () {
    return view('welcome');
});
