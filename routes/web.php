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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/index', function () {
//     return view('main');
// })->name('main');

Route::get('/news/post', function () {
    return view('post');
})->name('post');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/', [\App\Http\Controllers\NewsController::class, 'index'])->name('index');
Route::get('news/{id}', [\App\Http\Controllers\NewsController::class, 'show'])->name('show');
Route::get('/create', [\App\Http\Controllers\NewsController::class, 'create'])->name('create');
Route::post('/news/store', [\App\Http\Controllers\NewsController::class, 'store'])->name('news-store');

Route::post('/comment/store', [\App\Http\Controllers\CommentController::class, 'store'])->name('comment.add');
