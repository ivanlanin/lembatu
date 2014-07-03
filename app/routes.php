<?php
// Filter
Route::filter('auth', function () {
    if (Auth::guest()) {
        return Redirect::to('login');
    }
});

// Dashboard, login, and logout
Route::get('logout', array('uses' => 'HomeController@doLogout'));
Route::get('login', array('uses' => 'HomeController@showLogin'));
Route::post('login', array('uses' => 'HomeController@doLogin'));

// Resources
Route::group(array('before' => 'auth'), function () {
    Route::get('/', array('uses' => 'HomeController@showDashboard'));
    Route::resource('projects', 'ProjectController');
});
