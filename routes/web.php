<?php



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users/logout', 'Auth\LoginController@userlogout')->name('user.logout');


Route::prefix('admin')->group(function(){
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

    Route::get('/', 'AdminController@index')->name('admin.dashboard');

    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

    Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');

    Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');

    Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');

    Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
});

Route::prefix('instructor')->group(function(){
    Route::get('/login', 'Auth\InstructorLoginController@showLoginForm')->name('instructor.login');
    Route::post('/login', 'Auth\InstructorLoginController@login')->name('instructor.login.submit');

    Route::get('/', 'InstructorController@index')->name('instructor.dashboard');

    Route::get('/logout', 'Auth\InstructorLoginController@logout')->name('instructor.logout');

    Route::post('/password/email', 'Auth\InstructorForgotPasswordController@sendResetLinkEmail')->name('instructor.password.email');

    Route::get('/password/reset', 'Auth\InstructorForgotPasswordController@showLinkRequestForm')->name('instructor.password.request');

    Route::post('/password/reset', 'Auth\InstructorResetPasswordController@reset');

    Route::get('/password/reset/{token}', 'Auth\InstructorResetPasswordController@showResetForm')->name('instructor.password.reset');
});

