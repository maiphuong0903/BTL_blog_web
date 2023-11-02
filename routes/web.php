<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TutorialController;
use App\Http\Controllers\TagsController;
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
Route::get('/posts', [PostController::class, 'getPosts'])->name('client.posts');
Route::get('/contact', function () {
    return view('client.pages.contact');
})->name('client.contact');


Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/admin/home', function () {
    return view('admin.pages.home');
})->name('admin.home');

//Bài Viết - Posts
Route::get('/admin/qlbaiviet', function () {
    return view('admin.pages.quanlybaiviet.listPosts');
})->name('admin.qlbaiviet');

// Tài Khoản - Users
Route::get('/admin/qltaikhoan', [UserController::class, 'index'])->name('admin.qltaikhoan');
Route::get('/users/create', [UserController::class, 'create'])->name('themtaikhoan');
Route::post('/users', [UserController::class, 'store']);

// Danh Mục - Tutorials
Route::get('/admin/qldanhmuc', [TutorialController::class, 'index'])->name('admin.qldanhmuc');
Route::get('/danhmuc/detail/{id}', [TutorialController::class, 'show'])->name('danhmuc.detail');
Route::get('/themdanhmuc', [TutorialController::class, 'create'])->name('admin.themdanhmuc');
Route::post('/add_danhmuc', [TutorialController::class, 'store']);
Route::get('/suadanhmuc/{id}', [TutorialController::class, 'edit'])->name('admin.suadanhmuc');
Route::put('/edit_danhmuc/{id}', [TutorialController::class, 'update']);
Route::delete('/delete_danhmuc/{id}', [TutorialController::class, 'destroy']);

// Tags
Route::get('/admin/qltag', [TagsController::class, 'index'])->name('admin.qlTag');
// Route::get('/danhmuc/detail/{id}', [TutorialController::class, 'show'])->name('danhmuc.detail');
// Route::get('/themdanhmuc', [TutorialController::class, 'create'])->name('admin.themdanhmuc');
// Route::post('/add_danhmuc', [TutorialController::class, 'store']);
// Route::get('/suadanhmuc/{id}', [TutorialController::class, 'edit'])->name('admin.suadanhmuc');
// Route::put('/edit_danhmuc/{id}', [TutorialController::class, 'update']);
// Route::delete('/delete_danhmuc/{id}', [TutorialController::class, 'destroy']);

Route::get('/dashboard', function () {
    return view('admin.pages.home');
})->middleware(['auth', 'verified'])->name('dashboard/home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
