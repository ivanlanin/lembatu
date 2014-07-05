<?php
// Filter
Route::filter('auth', function () {
    if (Auth::guest()) {
        return Redirect::to('login');
    }
});

// Dashboard, login, and logout
Route::get('logout', array('uses' => 'Lembatu\Controller\HomeController@doLogout'));
Route::get('login', array('uses' => 'Lembatu\Controller\HomeController@showLogin'));
Route::post('login', array('uses' => 'Lembatu\Controller\HomeController@doLogin'));

// Resources
Route::group(array('before' => 'auth'), function () {
    Route::get('/', array('uses' => 'Lembatu\Controller\HomeController@showDashboard'));
    Route::resource('projects', 'Lembatu\Controller\ProjectController');
});
