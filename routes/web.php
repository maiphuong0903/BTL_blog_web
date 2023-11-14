<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TutorialController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Models\Post;

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
Route::get('account', [HomeController::class, 'account'])->name('client.account');
Route::get('/search', [HomeController::class, 'search'])->name('home.search');
Route::get('/tutorial/{tutorial_id}', [HomeController::class, 'getByTutorial'])->name('home.tutorial');
Route::get('account/edit', [HomeController::class, 'edit'])->name('client.edit');
Route::patch('account/update', [HomeController::class, 'update'])->name('client.account.update');
Route::get('account/pass', [HomeController::class, 'pass'])->name('client.pass');
Route::put('account/updatePass', [HomeController::class, 'updatePass'])->name('client.updatePass');
Route::get('account/list_like', [HomeController::class, 'list_like'])->name('client.list_like');


Route::get('account/posts', [HomeController::class, 'account_post'])->name('client.account.posts');
Route::get('account/posts/pending', [HomeController::class, 'account_post_pending'])->name('client.account.post_pending');
Route::get('account/posts/refuse', [HomeController::class, 'account_post_refuse'])->name('client.account.post_refuse');
Route::get('account/post/create', [HomeController::class, 'post_create'])->name('client.posts.post_create');
Route::post('account/post/upload_image', [HomeController::class, 'uploadImage_pots'])->name('client.posts.uploadImage_pots');
Route::post('account/post/store', [HomeController::class, 'post_store'])->name('client.posts.post_store');
Route::get('account/post/edit/{id}', [HomeController::class, 'post_edit'])->name('client.posts.post_edit');
Route::put('account/post/update/{id}', [HomeController::class, 'post_update'])->name('client.posts.post_update');
Route::delete('account/post/post_destroy/{id}', [HomeController::class, 'post_destroy'])->name('client.posts.post_destroy');
Route::get('account/post/show/{id}', [HomeController::class, 'show'])->name('client.posts.show');
Route::post('account/post/pending/{postId}', [HomeController::class, 'post_pending'])->name('client.posts.pending');


Route::get('/post/{post}', [PostController::class, 'getPostDetail'])->name('client.post.detail');
Route::get('/posts', [PostController::class, 'getPosts'])->name('client.posts');

Route::get('/posts/{tagId}', [TagsController::class, 'getPostTag'])->name('client.posts.getPostTag');
Route::post('/like/{post}', [LikeController::class, 'toggleLike'])->name('client.like.toggle');

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
        Route::get('/posts', [DashboardController::class, 'getPostsCountThisMonth']);

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
            Route::get('/getPost', [PostController::class, 'getPost'])->name('admin.posts.getPost');
            Route::get('/getPost/approve', [PostController::class, 'post_approve'])->name('admin.posts.post_approve');
            Route::post('/approve/{postId}', [PostController::class, 'approve'])->name('admin.posts.approve');
            Route::post('/refuse/{postId}', [PostController::class, 'refuse'])->name('admin.posts.refuse');
            Route::get('/show/{postId}', [PostController::class, 'show'])->name('admin.posts.show');
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
Route::prefix('comments')->group(function () {
    Route::post('/store/{post_id}', [CommentController::class, 'store'])->name('client.comments.store');
});


require __DIR__ . '/auth.php';
