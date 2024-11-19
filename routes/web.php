<?php

use App\Http\Controllers\AnswerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\SignUpController;
use App\Http\Controllers\My\UserController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Ini adalah file routes utama untuk web app.
| Gue bikin lebih rapi dan grouping sesuai fungsi.
|
*/

// ** Route Home **
Route::get('/', function () {
    return view('home');
})->name('home');

// ** Auth Routes **
Route::middleware('auth')->group(function () {

    Route::namespace('App\Http\Controllers\My')->group(function () {
        Route::resource('users', UserController::class)->only(['edit', 'update']);
    });
    
    // Resource routes untuk diskusi (hanya untuk user yang login)
    Route::resource('diskusi', DiscussionController::class)
        ->only(['create', 'store', 'edit', 'update', 'destroy']); // Private routes (auth-only)

    // Like & Unlike untuk diskusi
    Route::post('diskusi/{discussion}/like', [LikeController::class, 'discussionLike'])->name('diskusi.like');
    Route::post('diskusi/{discussion}/unlike', [LikeController::class, 'discussionUnlike'])->name('diskusi.unlike');

    // Store Jawaban
    Route::post('/diskusi/{slug}/answers', [AnswerController::class, 'store'])->name('answer.store');

    Route::resource('answers', AnswerController::class)->only('edit', 'update', 'destroy');
    Route::post('answers/{answer}/like', [LikeController::class, 'answerLike'])->name('answers.like');
    Route::post('answers/{answer}/unlike', [LikeController::class, 'answerUnlike'])->name('answers.unlike');
});


// ** Auth Routes **
Route::prefix('auth')->group(function () {
    Route::get('login', [LoginController::class, 'show'])->name('auth.login.show');
    Route::post('login', [LoginController::class, 'login'])->name('auth.login.login');
    Route::post('logout', [LoginController::class, 'logout'])->name('auth.login.logout');

    Route::get('register', [SignUpController::class, 'show'])->name('auth.sign-up.show');
    Route::post('register', [SignUpController::class, 'signUp'])->name('auth.sign-up.sign-up');
});

// ** Discussion Routes **
Route::resource('diskusi', DiscussionController::class)
    ->only(['index', 'show']); // Public routes (tanpa middleware auth)

Route::middleware('auth')->group(function () {
    Route::resource('diskusi', DiscussionController::class)
        ->only(['create', 'store', 'edit', 'update', 'destroy']); // Private routes (auth-only)
    
    // Like & Unlike untuk diskusi
    Route::post('diskusi/{discussion}/like', [LikeController::class, 'discussionLike'])->name('diskusi.like');
    Route::post('diskusi/{discussion}/unlike', [LikeController::class, 'discussionUnlike'])->name('diskusi.unlike');

    Route::post('/discussion/{slug}/answers', [AnswerController::class, 'store'])->name('answer.store');
});

Route::namespace('App\Http\Controllers\My')->group(function () {
    Route::get('users/{username}', [UserController::class, 'show'])->name('users.show');
});

// ** Kategori Diskusi Routes **
Route::get('diskusi/kategori/{categorySlug}', [CategoryController::class, 'show'])->name('diskusi.kategori.show');

Route::namespace('App\Http\Controllers')->group(function(){
    Route::get('/', 'HomeController@index')->name('home');
});
