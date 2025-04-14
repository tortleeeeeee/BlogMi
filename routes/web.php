<?php

use App\Http\Controllers\BlogMiController;
use App\Models\BlogMi;
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
    //PAGES
    Route::get('/', [BlogMiController::class, 'index'])->name('index');
    Route::get('/blogs', [BlogMiController::class, 'blogs'])->name('blogs');
    Route::get('/profile', [BlogMiController::class, 'profile'])->name('profile');

    //CRUD
    Route::get('/createBlog', [BlogMiController::class, 'createBlog'])->name('createBlog');
    Route::post('/storeBlog', [BlogMiController::class, 'storeBlog'])->name('storeBlog');
    Route::get('/{blog}', [BlogMiController::class, 'displayBlog'])->name('displayBlog');
    Route::get('/edit/{blog}', [BlogMiController::class, 'editBlog'])->name('editBlog');
    Route::post('/update/{blog}', [BlogMiController::class, 'updateBlog'])->name('updateBlog');
    Route::get('/delete/{blog}', [BlogMiController::class, 'deleteBlog'])->name('deleteBlog');
