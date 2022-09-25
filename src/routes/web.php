<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FollowUserController;
use App\Models\FollowUser;
use App\Http\Controllers\CalendarController;

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

Route::group(['middleware' => 'auth'], function (){
    Route::get('post/create',[PostController::class, 'store'])->name('post.create');
    Route::get('post/{post}', [PostController::class, 'show'])->name('post.show');

    Route::resource('post', PostController::class);

    Route::post('post/{post}/favorites', [FavoriteController::class, 'store'])->name('favorites');
    Route::post('post/{post}/unfavorites', [FavoriteController::class, 'destroy'])->name('unfavorites');

    // フォロー機能 test
    // Route::post('/users/{user}/follow', [FollowUserController::class,'follow']);
    // Route::post('/users/{user}/unfollow', [FollowUserController::class, 'unfollow']);

    Route::post('user/{user}/follow',[FollowUserController::class, 'store'])->name('follow');
    Route::post('user/{user}/unfollow',[FollowUserController::class, 'destroy'])->name('unfollow');

    // Route::get('/logout', [AuthenticationController::class, 'logout'])->name('logout');

});

// カレンダー機能
// Route::post('/test',[CalendarController::class, 'index'])->name('test');
Route::get('/test',[CalendarController::class, 'index'])->name('test.index');
Route::post('/test',[CalendarController::class, 'scheduleAdd'])->name('test.add');


Route::resource('/mypage', UserController::class);

Route::get('/', function () {
    return view('welcome');
});


// Route::resource('/comment', 'CommentController',['only' => ['store']]);



// コメントのRoute
// コメントの投稿処理
Route::get('/posts/{comment_id}/comments',[CommentController::class,'store']);

// 一旦確認用
Route::get('/comment/show/{post_id}', [CommentController::class,'show'])->name('comment.show');

Route::get('/comment/create', [CommentController::class,'create']);
Route::post('/comment/store', [CommentController::class,'store'])->name('comment.store');

// コメント削除処理
Route::post('/comment/{comment_id}', [CommentController::class,'destroy'])->name('comment.destroy');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// Route::middleware('auth')->group(function () {
    // Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
    //     ->name('logout');
// });
