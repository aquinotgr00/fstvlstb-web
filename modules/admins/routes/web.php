<?php

Route::middleware('admin_guess')->group(function () {
    Route::get('/login', 'LoginController@showLoginForm')->name('admins.login');
    Route::post('/login', 'LoginController@login');
});

Route::middleware('auth:admin')->group(function () {
    Route::post('/logout', 'LoginController@logout')->name('admins.logout');

    Route::get('/', function () {
        return view('admins::dashboard');
    })->name('admins.dashboard');
});

if (!Route::has('login')) {
    Route::get('/blank', function () {})->name('login');
}
