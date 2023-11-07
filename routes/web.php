<?php

use App\Http\Controllers\DashboardController;
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
Route::get('/', [HomeController::class, 'index'])->name('client.home');
Route::get('/post/{post}', [PostController::class, 'getPostDetail'])->name('client.post.detail');
Route::get('/posts', [PostController::class, 'getPosts'])->name('client.posts');
Route::get('/contact', function () {
    return view('client.pages.contact');
})->name('client.contact');


Route::get('/login', function () {
    return view('auth.login');
})->name('login');


Route::middleware('admin')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('admin')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('admin.home');

        Route::prefix('users')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('admin.users.index');
        });

        Route::prefix('tutorials')->group(function () {
            Route::get('/', [TutorialController::class, 'index'])->name('admin.tutorials.index');
            Route::get('/detail/{id}', [TutorialController::class, 'show'])->name('admin.tutorials.detail');
            Route::get('/create', [TutorialController::class, 'create'])->name('admin.tutorials.create');
            Route::post('/store', [TutorialController::class, 'store'])->name('admin.tutorials.store');
            Route::get('/edit/{id}', [TutorialController::class, 'edit'])->name('admin.tutorials.edit');
            Route::put('/update/{id}', [TutorialController::class, 'update'])->name('admin.tutorials.update');
            Route::delete('/delete/{id}', [TutorialController::class, 'destroy'])->name('admin.tutorials.destroy');
        });

        Route::prefix('posts')->group(function () {
            Route::get('/', [PostController::class, 'index'])->name('admin.posts.index');
            Route::get('/create', [PostController::class, 'create'])->name('admin.posts.create');
            Route::post('/upload_image', [PostController::class, 'uploadImage'])->name('admin.posts.upload_image');
            Route::post('/store', [PostController::class, 'store'])->name('admin.posts.store');
            Route::get('/edit/{id}', [PostController::class, 'edit'])->name('admin.posts.edit');
            Route::put('/update/{id}', [PostController::class, 'update'])->name('admin.posts.update');
            Route::delete('/delete/{id}', [PostController::class, 'destroy'])->name('admin.posts.destroy');
        });

        Route::prefix('tags')->group(function () {
            Route::get('/', [TagsController::class, 'index'])->name('admin.tags.index');
            Route::get('/detail/{id}', [TagsController::class, 'show'])->name('admin.tags.detail');
            Route::get('/create', [TagsController::class, 'create'])->name('admin.tags.create');
            Route::post('/store', [TagsController::class, 'store'])->name('admin.tags.store');
            Route::get('/edit/{id}', [TagsController::class, 'edit'])->name('admin.tags.edit');
            Route::put('/update/{id}', [TagsController::class, 'update'])->name('admin.tags.update');
            Route::delete('/delete/{id}', [TagsController::class, 'destroy'])->name('admin.tags.destroy');
        });
    });
});

require __DIR__ . '/auth.php';
