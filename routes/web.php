<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|c:\laragon\www\phongtro1\resources\views\head.blade.php
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::get('/xa', [WardController::class, 'search']);
Route::get('/logout', [LoginController::class, 'destroy']);
Route::get('/',[LoginController::class, 'home']);
Route::get('/post/list', [PostController::class, 'showAll']);
Route::middleware('auth')->group(function () {

    /* Admin */
    Route::prefix('/admin')->group(function () {
        Route::get('/', [AdminController::class, 'index']);
        Route::post('/user/block', [AdminController::class, 'block']);
        Route::post('/user/topup', [AdminController::class, 'topUp']);
        Route::get('/user/unblock', [AdminController::class, 'unblock']);
        Route::get('/user', [AdminController::class, 'getUser']);
        Route::get('/banned_user', [AdminController::class, 'getUserbanned']);
        Route::get('/post', [AdminController::class, 'getPost']);
        Route::get('/post/duyet', [AdminController::class, 'duyet']);
        Route::get('/post/tuchoi', [AdminController::class, 'tuchoi']);
    }
    );

    

    Route::prefix('/profile')->group(function () { 
        Route::get('/index', [UserController::class, 'index']);
        Route::get('/edit', [UserController::class, 'edit']);
        Route::post('/edit', [UserController::class, 'update']);
        Route::get('/dadang', [UserController::class, 'dadang']);
        Route::get('/chuaduyet', [UserController::class, 'chuaduyet']);
        Route::get('/tuchoi', [UserController::class, 'tuchoi']);
    }
    );
    Route::get('/profile', [UserController::class, 'index']);

    Route::prefix('/post')->group(function () {
        Route::get('/create', [PostController::class, 'index']);
        Route::post('/create', [PostController::class, 'store']);
        // Route::get('/list', [PostController::class, 'showAll'])->name('post_list');
        Route::get('/hetphong', [PostController::class, 'hetPhong']);
        Route::get('/conphong', [PostController::class, 'conPhong']);
        Route::get('/{post}', [PostController::class, 'show']);
        Route::post('/{post}', [CommentController::class, 'store']);
    }
    );

    #Upload
    Route::post('/profile/upload/services', [UploadController::class, 'store']);
});