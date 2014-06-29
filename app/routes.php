<?php

// Filter
Route::filter('auth', function () {
    if (Auth::guest()) {
        return Redirect::to('login');
    }
});

// Dashboard
Route::get('/', function () {
    return View::make('home.dashboard');
});

// Login and logout
Route::get('logout', array('uses' => 'HomeController@doLogout'));
Route::get('login', array('uses' => 'HomeController@showLogin'));
Route::post('login', array('uses' => 'HomeController@doLogin'));

// Resources
Route::group(array('before' => 'auth'), function () {
    Route::resource('nerds', 'NerdController');
    Route::resource('projects', 'ProjectController');
});
