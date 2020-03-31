<?php
 

Route::get('login', 'Auth\LoginController@showLoginForm')->name('student.login');
Route::get('student-password/reset', 'Auth\ForgetPasswordController@sendResetLinkEmail')->name('student.password.email');
Route::get('student-password/reset', 'Auth\ForgetPasswordController@showLinkRequestForm')->name('student.password.request');
Route::get('logout', 'Auth\LoginController@logout')->name('student.logout.get');
Route::post('login', 'Auth\LoginController@login')->name('student.login.post');
Route::group(['middleware' => 'admin'], function() {
	Route::get('dashboard', 'DashboardController@index')->name('student.dashboard');
	Route::get('image/{image}', 'DashboardController@image')->name('student.image');
	Route::get('homework/{homework}', 'DashboardController@homework')->name('student.homework.view');
	Route::get('profile', 'DashboardController@profile')->name('student.profile');

	Route::post('password-change', 'DashboardController@passwordChange')->name('student.password.change');
	
	Route::get('homeworks', 'DashboardController@homeworkList')->name('student.homewok.list');
	Route::get('attendance', 'DashboardController@attendance')->name('student.attendance');
	Route::get('fee/details', 'DashboardController@feeDetails')->name('student.fee.details'); 
	Route::get('class-test', 'DashboardController@classTest')->name('student.class.test'); 
	Route::get('event', 'DashboardController@event')->name('student.event'); 
	Route::get('remarks', 'DashboardController@remarks')->name('student.remarks');
	Route::get('view/{id}', 'DashboardController@remarksView')->name('student.remarks.details.view'); 
	Route::get('student-reply-remark/{id}', 'DashboardController@studentReplyremarks')->name('student.reply.remarks'); 
	Route::post('student-reply-remark-store/{id}', 'DashboardController@studentReplyremarkStore')->name('student.reply.remarks.store');

	//------------------------Library-------------------------------------------

	Route::get('library', 'DashboardController@library')->name('student.library'); 
	Route::get('book-reserve', 'DashboardController@bookReserve')->name('student.book.reserve'); 
	Route::get('student-book-reserve', 'DashboardController@bookReserveOnchange')->name('student.book.reserve.onchange');
	Route::post('book-reserve-update', 'DashboardController@bookReserveStatusUpdate')->name('student.book.reserve.status.update'); 
});

 