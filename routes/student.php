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
	Route::post('homeworks-show', 'DashboardController@homeworkListShow')->name('student.homewok.list.show');
	Route::get('attendance', 'DashboardController@attendance')->name('student.attendance');
	Route::get('view-syllabus', 'DashboardController@viewSyllabus')->name('student.view.syllabus');
	Route::get('upload-document', 'DashboardController@uploadDocument')->name('student.upload.document');
	Route::get('leave-apply', 'DashboardController@leaveApply')->name('student.leave.apply');
	Route::get('leave-apply-form', 'DashboardController@leaveApplyForm')->name('student.leave.apply.form');
	Route::post('leave-apply-store', 'DashboardController@leaveApplyStore')->name('student.leave.apply.store');
	Route::get('fee/details', 'DashboardController@feeDetails')->name('student.fee.details'); 
	Route::get('fee-receipt', 'DashboardController@feeReceipt')->name('student.fee.receipt'); 
	Route::post('fee-receipt-show', 'DashboardController@feeReceiptShow')->name('student.fee.receipt,show'); 
	Route::get('fee-pay', 'DashboardController@feePay')->name('student.fee.pay'); 

	Route::get('fee-certificate', 'DashboardController@feeCertificate')->name('student.fee.certificate'); 
	Route::get('fee-certificate-download/{id}', 'DashboardController@feeCertificateDownload')->name('student.fee.certificate.download'); 
	
	Route::get('class-test', 'DashboardController@classTest')->name('student.class.test'); 
	Route::post('class-test-show', 'DashboardController@classTestShow')->name('student.class.test.show'); 
	Route::get('exam-schedule', 'DashboardController@examSchedule')->name('student.exam.schedule'); 
	Route::post('exam-schedule-show', 'DashboardController@examScheduleShow')->name('student.exam.schedule.show'); 
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

 