<?php

Route::get('/', function () {
    return View::make('pages.home');
});
Route::get('about', function () {
    return View::make('pages.about');
});
Route::get('projects', function () {
    return View::make('pages.projects');
});
Route::get('contact', function () {
    return View::make('pages.contact');
});

// Login and logout
Route::get('login', array('uses' => 'HomeController@showLogin'));
Route::post('login', array('uses' => 'HomeController@doLogin'));
Route::get('logout', array('uses' => 'HomeController@doLogout'));

// Auth
Route::group(array('before'=>'auth'), function () {
    Route::resource('nerds', 'NerdController');
});

Route::filter('auth', function () {
    if (Auth::guest()) {
        return Redirect::to('login');
    }
});
