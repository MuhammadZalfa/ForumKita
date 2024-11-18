<?php

use App\Http\Controllers\AnswerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\SignUpController;

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

    Route::post('/discussion/{slug}/answers', [AnswerController::class, 'store'])->name('diskusi.store');
});

// ** Kategori Diskusi Routes **
Route::get('diskusi/kategori/{categorySlug}', [CategoryController::class, 'show'])->name('diskusi.kategori.show');

// ** Profil User (Optional Dummy Route) **
Route::get('diskusi/lorem', function () {
    return view('pages.users.show');
})->name('profile');
