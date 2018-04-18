<?php
 

Route::get('login', 'Auth\LoginController@showLoginForm')->name('student.login');
Route::get('student-password/reset', 'Auth\ForgetPasswordController@sendResetLinkEmail')->name('student.password.email');
Route::get('student-password/reset', 'Auth\ForgetPasswordController@showLinkRequestForm')->name('student.password.request');
Route::get('logout', 'Auth\LoginController@logout')->name('student.logout.get');
Route::post('login', 'Auth\LoginController@login');
Route::group(['middleware' => 'student'], function() {
	Route::get('dashboard', 'DashboardController@index')->name('student.dashboard');

});
 