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
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FileEditorController;

// welcome page
Route::get('/', function () {
    return view('welcome');
});

// auth with github
Route::get('/auth/github', [App\Http\Controllers\AuthController::class, 'redirectToGitHub'])->name('auth.redirect-to-github');
Route::get('/auth/github/callback', [App\Http\Controllers\AuthController::class, 'handleGitHubCallback'])->name('auth.handle-github-callback');


Route::get('/archive', [PostController::class, 'index'])->name('posts.index'); //show everything as archived
Route::get('/{year}/{month}/{slug}', [PostController::class, 'show'])->name('post.show');


Route::get('/editor', [FileEditorController::class, 'show'])->name('editor.show');
Route::post('/editor', [FileEditorController::class, 'update'])->name('editor.update');


