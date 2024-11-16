<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\SignUpController;

// Route untuk halaman create dan store untuk resource diskusi
Route::middleware('auth')->group(function () {
    Route::resource('diskusi', DiscussionController::class)
        ->only(['create', 'store', 'edit', 'update', 'destroy']);
    Route::post('diskusi/{discussion}/like', 'LikeController@discussionLike')->name('diskusi.like.like');
    Route::post('diskusi/{discussion}/unlike', 'LikeController@discussionUnlike')->name('diskusi.like.unlike');
});

Route::namespace('App\Http\Controllers')->group(function () {
    Route::resource('diskusi', DiscussionController::class)
        ->only(['index', 'show']);
});

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    // Resource route untuk diskusi
    Route::resource('diskusi', DiscussionController::class)->only(['index', 'show']);

    // Route tunggal untuk kategori
    Route::get('diskusi/kategori/{categorySlug}', [CategoryController::class, 'show'])
        ->name('diskusi.kategori.show');
});

// Route untuk halaman lainnya
Route::get('/', function () {
    return view('home');
})->name('home');

// Route untuk Auth
Route::namespace('App\Http\Controllers\Auth')->group(function () {
    Route::get('login', 'LoginController@show')->name('auth.login.show');
    Route::post('login', 'LoginController@login')->name('auth.login.login');
    Route::post('logout', 'LoginController@logout')->name('auth.login.logout');
    Route::get('register', 'SignUpController@show')->name('sign-up');
    Route::post('register', 'SignUpController@signUp')->name('auth.sign-up.sign-up');
});

// Route lainnya untuk melihat diskusi dan detailnya

Route::get('diskusi/lorem', function () {
    return view('pages.users.show');
})->name('profile');
