<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [HomeController::class, 'index'])->name('client.home');
Route::get('/post/{post}', [PostController::class, 'getPostDetail'])->name('client.post.detail');

Route::get('/contact', function () {
    return view('client.pages.contact');
})->name('client.contact');

Route::get('/posts', function () {
    return view('client.pages.posts');
})->name('client.posts');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/admin/home', function () {
    return view('admin.pages.home');
})->name('admin.home');

Route::get('/admin/qlbaiviet', function () {
    return view('admin.pages.quanlybaiviet.listPosts');
})->name('admin.qlbaiviet');


Route::get('/admin/qltaikhoan', function () {
    return view('admin.pages.quanlytaikhoan.listUsers');
})->name('admin.qltaikhoan');

Route::get('/admin/qldanhmuc', function () {
    return view('admin.pages.quanlydanhmuc.listTutorials');
})->name('admin.qldanhmuc');

Route::get('/dashboard', function () {
    return view('admin.pages.home');
})->middleware(['auth', 'verified'])->name('dashboard/home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
