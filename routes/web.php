<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('login', function () {
    return view('pages.auth.login');
})->name('login');

Route::get('register', function () {
    return view('pages.auth.sign-up');
})->name('sign-up');

Route::get('diskusi', function () {
    return view('pages.discussion.index');
})->name('diskusi');

Route::get('diskusi/lorem', function () {
    return view('pages.discussion.show');
})->name('detail');

Route::get('diskusi/create', function () {
    return view('pages.discussion.form');
})->name('create-form');
