<?php

use App\Http\Controllers\Admin\reportGenerateBarcode;
 
Route::get('/', 'Auth\LoginController@index')->name('admin.home');
Route::get('login', 'Auth\LoginController@showLoginForm')->name('admin.login'); 
Route::get('admin-password/reset', 'Auth\ForgetPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('passwordreset/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::get('logout', 'Auth\LoginController@logout')->name('admin.logout.get');
Route::post('login', 'Auth\LoginController@login');
Route::get('forget-password', 'Auth\LoginController@forgetPassword')->name('admin.forget.password');
Route::post('forget-password-send-link', 'Auth\LoginController@forgetPasswordSendLink')->name('admin.forget.password.send.link');
Route::post('reset-password', 'Auth\LoginController@resetPassword')->name('admin.reset.password');
Route::get('refreshcaptcha', 'Auth\LoginController@refreshCaptcha')->name('admin.refresh.captcha');
Route::group(['middleware' => 'admin'], function() {
	Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard'); 
	Route::get('show-details', 'DashboardController@showStudentDetails')->name('admin.student.show.details');
	Route::get('registration-show-details', 'DashboardController@showStudentRegistrationDetails')->name('admin.student.Registration.details');
	Route::get('token', 'DashboardController@passportTokenCreate')->name('admin.token');
	Route::get('profile', 'DashboardController@proFile')->name('admin.profile');
	Route::get('profile-show', 'DashboardController@proFileShow')->name('admin.profile.show');
	Route::get('profile-show/{profile_pic}', 'DashboardController@proFilePhotoShow')->name('admin.profile.photo.show'); 
	Route::post('profile-update', 'DashboardController@profileUpdate')->name('admin.profile.update');
	Route::post('password-change', 'DashboardController@passwordChange')->name('admin.password.change');
	Route::get('profile-photo', 'DashboardController@profilePhoto')->name('admin.profile.photo');
	Route::post('upload-photo', 'DashboardController@profilePhotoUpload')->name('admin.profile.photo.upload');
	//---------------account-----------------------------------------	
	Route::prefix('account')->group(function () {
	    Route::get('form', 'AccountController@form')->name('admin.account.form');
	    Route::post('store', 'AccountController@store')->name('admin.account.post');
		Route::get('list', 'AccountController@index')->name('admin.account.list');
		Route::get('access', 'AccountController@access')->name('admin.account.access');
		Route::get('hot-menu', 'AccountController@accessHotMenu')->name('admin.account.access.hotmenu');
		Route::get('menuTable', 'AccountController@menuTable')->name('admin.account.menuTable');
		Route::get('access/hotmenu', 'AccountController@accessHotMenuShow')->name('admin.account.access.hotmenuTable');
		Route::post('access-store', 'AccountController@accessStore')->name('admin.userAccess.add');
		Route::post('access-hot-menu-store', 'AccountController@accessHotMenuStore')->name('admin.userAccess.hotMenuAdd');
		Route::get('edit/{account}', 'AccountController@edit')->name('admin.account.edit');
		Route::post('update/{account}', 'AccountController@update')->name('admin.account.edit.post');
		Route::get('delete/{account}', 'AccountController@destroy')->name('admin.account.delete');
		Route::get('status/{account}', 'AccountController@status')->name('admin.account.status');	 
		Route::get('r--status/{account}', 'AccountController@rstatus')->name('admin.account.r_status');	 
		Route::get('w-status/{account}', 'AccountController@wstatus')->name('admin.account.w_status');	 
		Route::get('d-status/{account}', 'AccountController@dstatus')->name('admin.account.d_status');
		Route::get('minu/{account}', 'AccountController@minu')->name('admin.account.minu');				
		Route::get('role', 'AccountController@role')->name('admin.account.role');				
		Route::get('role-menu', 'AccountController@roleMenuTable')->name('admin.account.roleMenuTable'); 
		Route::post('role-menu-store', 'AccountController@roleMenuStore')->name('admin.roleAccess.subMenu');
		Route::get('class-access', 'AccountController@classAccess')->name('admin.account.classAccess'); 
		Route::get('class-all', 'AccountController@classAllSelect')->name('admin.account.classAllSelect'); 
		Route::get('reset-password', 'AccountController@resetPassWord')->name('admin.account.reset.password'); 
		Route::post('reset-password-change', 'AccountController@resetPassWordChange')->name('admin.account.reset.password.change'); 
		Route::get('menu-ordering', 'AccountController@menuOrdering')->name('admin.account.menu.ordering'); 
		Route::get('menu-ordering-store', 'AccountController@menuOrderingStore')->name('admin.account.menu.ordering.store'); 
		Route::get('submenu-ordering-store', 'AccountController@subMenuOrderingStore')->name('admin.account.submenu.ordering.store'); 
		Route::get('menu-filter/{id}', 'AccountController@menuFilter')->name('admin.account.menu.filte'); 
		
						
		// Route::get('status/{minu}', 'AccountController@minustatus')->name('admin.minu.status'); 
	});
	//---------------master-----------------------------------------	
	Route::prefix('master-minu')->group(function () {
		Route::prefix('academic-year')->group(function () {
		    Route::get('list', 'AcademicYearController@index')->name('admin.academicYear.list');
		    Route::post('store', 'AcademicYearController@store')->name('admin.academicYear.store');
		    Route::get('edit/{id}', 'AcademicYearController@edit')->name('admin.academicYear.edit');
		    Route::get('default-value/{id}', 'AcademicYearController@defaultValue')->name('admin.academicYear.default.value');
		    Route::get('pdf-generate', 'AcademicYearController@pdfGenerate')->name('admin.academicYear.pdf.generate');
		    Route::post('update/{id}', 'AcademicYearController@update')->name('admin.academicYear.update');
		    Route::get('delete/{id}', 'AcademicYearController@destroy')->name('admin.academicYear.delete');
		    Route::get('document-type', 'DocumentTypeController@index')->name('admin.document.type');
		    Route::post('document-store', 'DocumentTypeController@store')->name('admin.document.store');
		    Route::get('document-edit/{id}', 'DocumentTypeController@edit')->name('admin.document.type.edit');
		    Route::post('document-update/{id}', 'DocumentTypeController@update')->name('admin.document.type.update');
		    Route::get('document-delete/{id}', 'DocumentTypeController@destroy')->name('admin.document.type.delete');
		     
		});
		Route::prefix('payment-mode')->group(function () {
		    Route::get('list', 'PaymentModeController@index')->name('admin.paymentMode.list');
		    Route::post('store', 'PaymentModeController@store')->name('admin.paymentMode.store');
		    Route::get('edit/{id}', 'PaymentModeController@edit')->name('admin.paymentMode.edit');
		    Route::post('update/{id}', 'PaymentModeController@update')->name('admin.paymentMode.update');
		    Route::get('delete/{id}', 'PaymentModeController@destroy')->name('admin.paymentMode.delete');
		    Route::get('pdf-generate', 'PaymentModeController@pdfGenerate')->name('admin.paymentMode.pdf.generate');
		     
		});
	 
	     
	});
		//---------------minu-----------------------------------------	
	Route::prefix('minu')->group(function () {
	    
		Route::get('status/{minu}', 'MinuController@status')->name('admin.minu.status');	 
		Route::get('r--status/{minu}', 'MinuController@rstatus')->name('admin.minu.r_status');	 
		Route::get('w-status/{minu}', 'MinuController@wstatus')->name('admin.minu.w_status');	 
		Route::get('d-status/{minu}', 'MinuController@dstatus')->name('admin.minu.d_status');
		Route::get('minu/{minu}', 'MinuController@minu')->name('admin.minu.minu');
		Route::post('menu-permission-check', 'MinuController@menuPermissionCheck')->name('admin.account.menu.permission.check'); 	 
	});
	//---------------Class create----------------------------------------
	Route::group(['prefix' => 'class'], function() {
	    Route::get('/', 'ClassTypeController@index')->name('admin.class.list');
	    Route::get('search', 'ClassTypeController@search')->name('admin.class.search');
	    Route::post('add', 'ClassTypeController@store')->name('admin.class.add');
	    Route::get('{classType}/edit', 'ClassTypeController@edit')->name('admin.class.edit');
	    Route::post('{classType}/update', 'ClassTypeController@update')->name('admin.class.update');
	    Route::get('{classType}/delete', 'ClassTypeController@destroy')->name('admin.class.delete');
	    Route::get('pdf-generate', 'ClassTypeController@pdfGenerate')->name('admin.class.pdf.generate');
	});
		//---------------Section Type create----------------------------------------
	Route::group(['prefix' => 'section'], function() {
	    Route::get('/', 'SectionTypeController@index')->name('admin.section.list');
	    Route::get('select', 'SectionTypeController@selectList')->name('admin.section.selectList');
	    Route::get('search', 'SectionTypeController@search')->name('admin.section.search');
	    Route::post('add', 'SectionTypeController@store')->name('admin.sectionType.add');
	    Route::get('edit/{id?}', 'SectionTypeController@edit')->name('admin.section.edit');
	    Route::post('update/{id?}', 'SectionTypeController@update')->name('admin.section.update');
	    Route::get('{sectionType}/delete', 'SectionTypeController@destroy')->name('admin.section.delete');
	    Route::get('pdf-generate', 'SectionTypeController@pdfGenerate')->name('admin.section.pdf.generate');

	});
	// ---------------Section with class----------------------------------------
	Route::group(['prefix' => 'manage-section'], function() {
	    Route::get('/', 'SectionController@index')->name('admin.manageSection.list');
	    Route::get('search', 'SectionController@search')->name('admin.manageSection.search');
	    Route::get('search2', 'SectionController@search2')->name('admin.manageSection.search2');
	    Route::post('add', 'SectionController@store')->name('admin.section.add');
	    Route::get('{manageSectionEdit}/edit', 'SectionController@edit')->name('admin.manageSection.edit');
	    Route::post('{manageSection}/update', 'SectionController@update')->name('admin.manageSection.update');
	    Route::get('{manageSection}/delete', 'SectionController@destroy')->name('admin.manageSection.delete');
	    Route::get('selectBoxSection', 'SectionController@sectionSelectBox')->name('admin.section.selectBox');        
	    Route::get('class-section-pdf', 'SectionController@classSectionPDF')->name('admin.section.class.section.pdf');        
	});
		// ---------------User with class----------------------------------------
	Route::group(['prefix' => 'user-class'], function() {
	    Route::get('/', 'AccountController@userClass')->name('admin.userClass.list');	   
	    Route::post('add', 'AccountController@userClassStore')->name('admin.userClass.add');
	    // Route::get('{manageSectionEdit}/edit', 'SectionController@edit')->name('admin.manageSection.edit');
	    // Route::post('{manageSection}/update', 'SectionController@update')->name('admin.manageSection.update');
	    // Route::get('{manageSection}/delete', 'SectionController@destroy')->name('admin.manageSection.delete');        
	});
	//---------------Class fee----------------------------------------
	 Route::group(['prefix' => 'class-fee'], function() {
        Route::group(['prefix' => 'class-fee'], function() {
             Route::get('/', 'ClassFeeController@index')->name('admin.account.classfee.list');
            Route::post('add', 'ClassFeeController@store')->name('admin.account.classfee.add');
            Route::get('{classFee}/edit', 'ClassFeeController@edit')->name('admin.account.classfee.edit');
            Route::post('{classFee}/update', 'ClassFeeController@update')->name('admin.account.classfee.update');
            Route::get('{classFee}/delete', 'ClassFeeController@destroy')->name('admin.account.classfee.delete');
        });
    });
	//---------------Student--------------------------------------------------------------------
	 Route::group(['prefix' => 'student'], function() {
	     Route::get('add', 'StudentController@create')->name('admin.student.form');	     
	     Route::get('{student}/view', 'StudentController@show')->name('admin.student.view');	   
	     Route::get('preview/{id}', 'StudentController@previewshow')->name('admin.student.preview');	   
	     Route::get('pdf/{id}', 'StudentController@pdfGenerate')->name('admin.student.pdf.generate');	   
	     Route::get('{student}/edit', 'StudentController@edit')->name('admin.student.edit');
	     Route::get('{student}/delete', 'StudentController@destroy')->name('admin.student.delete');
	     Route::get('{student}/profileedit', 'StudentController@profileedit')->name('admin.student.profileedit');
	     Route::get('{student}/totalfeeedit', 'StudentController@totalfeeedit')->name('admin.student.totalfeeedit');
	     Route::post('{student}/totalfeeupdate', 'StudentController@totalfeeupdate')->name('admin.student.totalfeeupdate');
	     Route::post('add', 'StudentController@store')->name('admin.student.post');
	     Route::post('{student}/update', 'StudentController@update')->name('admin.student.update');
	     Route::post('{student}/view-update', 'StudentController@viewUpdate')->name('admin.student.view-update');
	     Route::post('{student}/profileupdate', 'StudentController@profileupdate')->name('admin.student.profileupdate');
	     Route::post('list/{menuPermission}', 'StudentController@index')->name('admin.student.list'); 
	     Route::get('show-form', 'StudentController@showForm')->name('admin.student.show');
	    
	     Route::get('{student}/password-reset', 'StudentController@passwordReset')->name('admin.student.passwordreset'); 
	     Route::get('image/{image}', 'StudentController@image')->name('admin.student.image');
	     Route::post('image/{student}/update', 'StudentController@imageUpdate')->name('admin.student.profilepic.update');
	     Route::post('imageweb', 'StudentController@imageWebUpdate')->name('admin.student.profilepic.webupdate');
	     Route::get('camera/{id}', 'StudentController@camera')->name('admin.student.camera');
	     Route::get('export', 'StudentController@excelData')->name('admin.student.excel');
	     Route::get('import-view', 'StudentController@importview')->name('admin.student.excel.import');	      
	     Route::get('import-show', 'StudentController@importshow')->name('admin.student.excel.show');	      
	     Route::get('birthday', 'StudentController@birthday')->name('admin.student.birthday.list');	      
	     Route::post('birthday-search', 'StudentController@birthdaySearch')->name('admin.birthday.search'); 
	     Route::get('birthday-card/{id}', 'StudentController@birthdayPrint')->name('admin.birthday.card.pdf'); 
	     Route::get('birthday-sms-send/{student_id}{id}', 'StudentController@birthdaySmsSend')->name('admin.birthday.card.sms.send'); 
	     Route::post('birthday-card-all', 'StudentController@birthdayPrintAll')->name('admin.birthday.card.pdfAll');   
	     Route::post('import', 'StudentController@importStudent')->name('admin.student.excel.store');	      
	     Route::get('birthday-dashboard', 'StudentController@birthdayDashboard')->name('admin.student.birthday.dashboard');	      
	     Route::get('birthday-upcoming', 'StudentController@birthdayDashboardUpcoming')->name('admin.student.birthday.dashboard.upcoming');	      
	     
		 Route::get('new-admission', 'StudentController@newAdmission')->name('admin.student.new.adminssion');
		 Route::get('new-admission-status-change/{id}', 'StudentController@newAdmissionStatusChange')->name('admin.new.student.status.change');
		 Route::get('reset-admission', 'StudentController@resetAdmission')->name('admin.student.reset.adminssion');
		 Route::post('reset-admission-student-show', 'StudentController@resetAdmissionStudentShow')->name('admin.student.reset.adminssion.student.show');	      
		 
		Route::get('reset-roll-no', 'StudentController@resetRollNo')->name('admin.student.reset.roll');
		Route::post('reset-roll-no-show', 'StudentController@resetRollNoshow')->name('admin.student.reset.roll.no.show');
		Route::post('reset-roll-no-show-update', 'StudentController@resetRollNoshowUpdate')->name('admin.student.reset.roll.no.show.update');
		Route::post('reset-roll-no-update', 'StudentController@resetRollNoUpdate')->name('admin.student.reset.roll.no.update');
		Route::get('student-request-update', 'StudentController@studentRequestUpdate')->name('admin.student.request.update');


		});

	 	// ---------------Default Value----------------------------------------
	 Route::group(['prefix' => 'default-Value'], function() {
	    Route::get('/', 'StudentDefaultValueController@index')->name('admin.defaultValue.list');
	    Route::post('add', 'StudentDefaultValueController@store')->name('admin.defaultValue.post');
	    Route::get('template/{id}', 'StudentDefaultValueController@template')->name('admin.defaultValue.template');
	    
	 });
	 // ---------------Parents Info----------------------------------------
	 Route::group(['prefix' => 'parents-info'], function() {
	    Route::post('Parents-add', 'ParentInfoController@store')->name('admin.parents.add');
	    Route::get('Parents-list/{id}', 'ParentInfoController@perentTable')->name('admin.parents.list');
	    Route::get('Parents-add-form/{id}', 'ParentInfoController@perentInfoAddForm')->name('admin.parents.add.form');
	    Route::get('delete/{id}', 'ParentInfoController@destroy')->name('admin.parents.delete');
	    Route::get('edit/{id}', 'ParentInfoController@edit')->name('admin.parents.edit');
	    Route::get('image/{id}', 'ParentInfoController@image')->name('admin.parents.image');
	    Route::post('image-store', 'ParentInfoController@imageStore')->name('admin.parents.image.store');
	    Route::get('image-show/{image}', 'ParentInfoController@imageShow')->name('admin.parents.image.show');
	    Route::post('update/{id}', 'ParentInfoController@update')->name('admin.parents.update');
	    Route::get('parent-add-new', 'ParentInfoController@parentAddNew')->name('admin.parents.add.new'); 
	    Route::get('parent-search', 'ParentInfoController@parentSearch')->name('admin.parents.search');
	    Route::post('parent-search-post', 'ParentInfoController@parentSearchPost')->name('admin.parents.search.post');
	    Route::get('parent-add-existing', 'ParentInfoController@parentExisting')->name('admin.parents.existing');
	    Route::post('parent-add-existing-store', 'ParentInfoController@parentExistingStore')->name('admin.parents.existing.store');
	 });
	 Route::group(['prefix' => 'address'], function() {
	     Route::get('address/{student_id}', 'StudentAddressDetailController@address')->name('admin.parents.address');
	    Route::get('add-address/{student_id}', 'StudentAddressDetailController@addAddress')->name('admin.parents.add.address');
	    Route::get('sameAS', 'StudentAddressDetailController@sameAS')->name('admin.parents.add.address.sameas');
	    Route::post('address-store', 'StudentAddressDetailController@addressStore')->name('admin.parents.address.store');
	    Route::get('address-edit/{id}', 'StudentAddressDetailController@addressEdit')->name('admin.parents.address.edit');
	    Route::get('address-delete/{id}', 'StudentAddressDetailController@addressDelete')->name('admin.parents.address.delete');
	    Route::post('address-update/{id}', 'StudentAddressDetailController@addressUpdate')->name('admin.parents.address.update');
	 });
	  	// ---------------Medical Info----------------------------------------
	 Route::group(['prefix' => 'medical-info'], function() {
	    Route::post('add', 'StudentMedicalInfoController@store')->name('admin.medical.add');

	    Route::get('list/{id}', 'StudentMedicalInfoController@medicalInfoList')->name('admin.medical.info.list');
	    Route::get('add-form/{id}', 'StudentMedicalInfoController@medicalInfoAddForm')->name('admin.medical.info.add.form');
	    Route::get('delete/{id}', 'StudentMedicalInfoController@destroy')->name('admin.medical.delete');
	    Route::get('edit/{id}', 'StudentMedicalInfoController@edit')->name('admin.medical.edit');
	    Route::get('view/{id}', 'StudentMedicalInfoController@show')->name('admin.medical.view');
	    Route::post('update/{id}', 'StudentMedicalInfoController@update')->name('admin.medical.update');
	    Route::get('pdf-generate/{id}', 'StudentMedicalInfoController@pdfGenerate')->name('admin.medical.pdf.generate');
	    Route::get('send-sms/{id}', 'StudentMedicalInfoController@medicalSendSms')->name('admin.medical.send.sms');
	    Route::get('send-email/{id}', 'StudentMedicalInfoController@medicalSendEmail')->name('admin.medical.send.email');
	    Route::get('template-view/{id}', 'StudentMedicalInfoController@templateView')->name('admin.medical.template.view');
	 }); 
	   	// ---------------Sibling Info----------------------------------------
	 Route::group(['prefix' => 'sibling-info'], function() {
	    Route::get('show/{student}', 'StudentSiblingInfoController@show')->name('admin.sibling.show');
	    Route::get('table-show/{student_id}', 'StudentSiblingInfoController@tableShow')->name('admin.sibling.table.show');
	    Route::get('add-form/{student}', 'StudentSiblingInfoController@addForm')->name('admin.sibling.add.form');
	    Route::post('add/{student}', 'StudentSiblingInfoController@store')->name('admin.sibling.add');
	    Route::get('delete/{id}', 'StudentSiblingInfoController@destroy')->name('admin.sibling.delete');
	    Route::get('edit/{id}', 'StudentSiblingInfoController@edit')->name('admin.sibling.edit');
	    Route::post('update/{id}', 'StudentSiblingInfoController@update')->name('admin.sibling.update');
	 });
	  Route::group(['prefix' => 'student-subject'], function() {
	    Route::get('list/{student_id}', 'StudentSubjectController@index')->name('admin.studentSubject.list');
	    Route::get('add/{student_id}', 'StudentSubjectController@addForm')->name('admin.studentSubject.add');
	    Route::post('store', 'StudentSubjectController@store')->name('admin.studentSubject.store');
	    Route::get('delete/{id}', 'StudentSubjectController@destroy')->name('admin.studentSubject.delete');
	    Route::get('edit', 'StudentSubjectController@edit')->name('admin.studentSubject.edit');
	    Route::get('update', 'StudentSubjectController@edit')->name('admin.studentSubject.update');
	 });
 
	     	// ---------------sport-hobby----------------------------------------
	 Route::group(['prefix' => 'sport-hobby'], function() {
	    Route::post('add', 'StudentSportHobbyController@store')->name('admin.hobby.add');
	    Route::delete('delete', 'StudentSportHobbyController@destroy')->name('admin.hobby.delete');
	    Route::get('edit', 'StudentSportHobbyController@edit')->name('admin.hobby.edit');
	    Route::post('update', 'StudentSportHobbyController@update')->name('admin.hobby.update');
	 });
	      	// ---------------student Document----------------------------------------
	 Route::group(['prefix' => 'student-document'], function() {
	    Route::post('add', 'StudentDocumentController@store')->name('admin.document.add');
	    Route::get('delete/{document}', 'StudentDocumentController@destroy')->name('admin.document.delete');
	    Route::get('edit', 'StudentDocumentController@edit')->name('admin.document.edit');
	    Route::get('update', 'StudentDocumentController@edit')->name('admin.document.update');
	    Route::get('download/{document}', 'StudentDocumentController@download')->name('admin.document.download');
	 });

	 		// ---------------Suject Type----------------------------------------
	 	Route::group(['prefix' => 'subject-type'], function() {
	 	    Route::get('/', 'SubjectTypeController@index')->name('admin.subjectType.list');	
	 	   // Route::get('search', 'SubjectTypeController@search')->name('admin.subject.search');
	 	   Route::post('SubjectType-add', 'SubjectTypeController@store')->name('admin.subjectType.add');
	 	   Route::get('{subjectType}/edit', 'SubjectTypeController@edit')->name('admin.subjectType.edit');
	 	   Route::post('{subjectType}/update', 'SubjectTypeController@update')->name('admin.subjectType.update');
	 	   Route::delete('{subjectType}/delete', 'SubjectTypeController@destroy')->name('admin.subjectType.delete');
	 	   Route::get('pdf-generate', 'SubjectTypeController@pdfGenerate')->name('admin.subjectType.pdf.generate');
	         
	 	}); 
  
	 	// ---------------Subject----------------------------------------
	 	Route::group(['prefix' => 'subject'], function() {
	 	    Route::get('/', 'SubjectController@index')->name('admin.subject.manageSubject');
	 	    Route::get('search', 'SubjectController@search')->name('admin.subject.search');
	 	    Route::post('add', 'SubjectController@store')->name('admin.subject.add');
	 	    Route::get('{manageSubjectEdit}/edit', 'SubjectController@edit')->name('admin.manageSubject.edit');
	 	    Route::post('{manageSubject}/update', 'SubjectController@update')->name('admin.manageSubject.update');
	 	    Route::get('{manageSubject}/delete', 'SubjectController@destroy')->name('admin.manageSubject.delete');        
	 	    Route::get('class-subject-pdf', 'SubjectController@classSubjectPDF')->name('admin.manageSubject.pdf.generate');        
	 	});
	 // ---------------Signature-stamp---------------------------------------
	 Route::group(['prefix' => 'Signature-stamp'], function() {
	     Route::get('/', 'SignatureStampController@index')->name('admin.signature.stamp');
	     Route::get('add-form', 'SignatureStampController@addForm')->name('admin.signature.stamp.add.form');
	     Route::post('store', 'SignatureStampController@store')->name('admin.signature.stamp.store');
	     Route::get('table-show', 'SignatureStampController@tableShow')->name('admin.signature.stamp.table.show');
	     
	      
         
	 });
	 Route::group(['prefix' => 'activity'], function() {
	     Route::get('/', 'ActivityController@index')->name('admin.activity.list');
	     Route::get('delete/{activity}', 'ActivityController@destroy')->name('admin.activity.delete');
         
	 });
	  // ---------------Report----------------------------------------
	 Route::group(['prefix' => 'report'], function() {
	     Route::get('/', 'ReportController@index')->name('admin.student.report');
	     Route::post('search', 'ReportController@reportfilter')->name('admin.student.report.post');      
         
	 }); 
	 Route::group(['prefix' => 'student-report'], function() {
	     Route::get('report', 'ReportController@finalReportIndex')->name('admin.student.final.report');
	     Route::get('report-for', 'ReportController@finalReportForChange')->name('admin.student.final.report.for.change');
	     Route::get('class-wise-section', 'ReportController@finalReportClassWiseSection')->name('admin.student.final.report.class.wise.section');
	     Route::post('report-show', 'ReportController@finalReportShow')->name('admin.student.final.report.show');
	     Route::get('student-check', 'ReportController@finalReportStudentDetailsCheck')->name('admin.student.final.report.student.details.check'); 
	     Route::get('report-pendin-show', 'ReportController@finalReportPendingShow')->name('admin.student.final.report.pending.show'); 
	     Route::get('report-pendin-download', 'ReportController@finalReportPendingDownload')->name('admin.student.final.report.pending.download'); 
         
	 });
	 Route::group(['prefix' => 'general-report'], function() {
	     Route::get('report', 'ReportController@generalReport')->name('admin.student.general.report'); 
	     Route::get('report-for', 'ReportController@generalReportFor')->name('admin.student.general.report.for'); 
	     Route::post('report-generate', 'ReportController@reportGenerateBarcode')->name('admin.student.general.report.barcode'); 
	 });
	   // ---------------Certificate----------------------------------------
	 Route::group(['prefix' => 'certificate'], function() {
	     Route::get('/', 'CertificateIssueDetailController@index')->name('admin.student.certificateIssu.list');	 	
	     Route::get('show', 'CertificateIssueDetailController@create')->name('admin.student.certificateIssu.apply');
	     Route::get('table-show', 'CertificateIssueDetailController@tableShow')->name('admin.student.certificateIssu.apply.table.show');
	     Route::get('print/{certificate}', 'CertificateIssueDetailController@print')->name('admin.student.certificateIssu.print');
	     Route::post('store', 'CertificateIssueDetailController@store')->name('admin.student.certificateIssu.post');
	     Route::get('edit/{id}', 'CertificateIssueDetailController@edit')->name('admin.student.certificateIssu.edit');
	     Route::get('show/{certificate}', 'CertificateIssueDetailController@show')->name('admin.student.certificateIssu.show');
	     Route::get('delete/{id}', 'CertificateIssueDetailController@reject')->name('admin.student.certificateIssu.delete');
	     Route::post('update/{id}', 'CertificateIssueDetailController@update')->name('admin.student.certificateIssu.update');
	     Route::get('download/{certificate}', 'CertificateIssueDetailController@download')->name('admin.student.attachment.download');
	     Route::get('verify', 'CertificateIssueDetailController@verify')->name('admin.student.attachment.virify');
	     Route::get('approval', 'CertificateIssueDetailController@approval')->name('admin.student.attachment.approval');
	     Route::get('aproval-check/{id}', 'CertificateIssueDetailController@approvalCheck')->name('admin.student.attachment.approval.check');
	     Route::post('aproval/{id}', 'CertificateIssueDetailController@approvalStatus')->name('admin.student.attachment.approval.status');
	     Route::get('check-status', 'CertificateIssueDetailController@checkStatus')->name('admin.student.certificate.check.status');
	     Route::post('check-status-show', 'CertificateIssueDetailController@checkStatusShow')->name('admin.student.certificate.check.status.show');
	 });
	   // ---------------Tuition Fee Certificate----------------------------------------
	 Route::group(['prefix' => 'certificate-tuition'], function() {
	     Route::get('/', 'CertificateIssueDetailController@tuitionFeeShowForm')->name('admin.student.certificateIssu.tuition');	 
	     Route::get('result', 'CertificateIssueDetailController@tuitionFeeShowResult')->name('admin.student.certificateIssu.tuition.result');	 	
	     Route::get('show/{id}', 'CertificateIssueDetailController@tuitionPrint')->name('admin.student.certificateIssu.tuition.print');
	     Route::get('report-wise', 'CertificateIssueDetailController@reportWise')->name('admin.student.certificateIssu.report.wise');
	     Route::get('class-with-section', 'CertificateIssueDetailController@reportClassWithSection')->name('admin.student.certificateIssu.report.class.with.section');
	     Route::post('certificate-generate', 'CertificateIssueDetailController@reportCertificateGenerate')->name('admin.student.certificateIssu.report.certificate.generate');
	      Route::get('report-request-show', 'CertificateIssueDetailController@reportRequestShow')->name('admin.student.report.request.show');
	      Route::get('pendin-generate/{student_id}/{report_type_id}', 'CertificateIssueDetailController@reportRequestPendingGenerate')->name('admin.student.report.request.pending.generate');
	     // Route::get('show/{certificate}', 'CertificateIssueDetailController@show')->name('admin.student.certificateIssu.show');
	     // Route::get('delete', 'CertificateIssueDetailController@edit')->name('admin.student.certificateIssu.delete');
	     // Route::get('download/{certificate}', 'CertificateIssueDetailController@download')->name('admin.student.attachment.download');
	     // Route::get('verify/{certificate}', 'CertificateIssueDetailController@verify')->name('admin.student.attachment.virify');
	     // Route::get('approval/{certificate}', 'CertificateIssueDetailController@approval')->name('admin.student.attachment.approval');
	 });
	 	   // ---------------Remarks----------------------------------------
	Route::group(['prefix' => 'Remarks'], function() {
	     Route::get('/', 'CertificateIssueRemarkController@show')->name('admin.remark.show');	 	
	     Route::post('store', 'CertificateIssueRemarkController@store')->name('admin.remark.add');
	     
	 });
	// ---------------Homework----------------------------------------  
	Route::group(['prefix' => 'homework'], function() {
	    Route::get('/', 'HomeworkController@index')->name('admin.homework.list');	 	
	    Route::post('add', 'HomeworkController@store')->name('admin.homework.post');
	    Route::get('view/{id}', 'HomeworkController@view')->name('admin.homework.view');
	    Route::get('delete/{id}', 'HomeworkController@destroy')->name('admin.homework.delete');
	    Route::get('search', 'HomeworkController@search')->name('admin.homework.search');
	    Route::post('send-homework', 'HomeworkController@sendHomework')->name('admin.homework.send.homework');
	    Route::get('homework-send/{id}', 'HomeworkController@HomeworkSend')->name('admin.homework.homework.send');
	 });
	
	 
	 //------------------------- Academic Year --------------------------------- 
	Route::group(['prefix' => 'academic-year'], function() {
	    Route::get('/', 'AcademicYearController@index')->name('admin.academic.year.list');	 	
	    Route::get('search', 'AcademicYearController@search')->name('admin.academic.year.search');	 	
	    Route::post('add', 'AcademicYearController@store')->name('admin.academic.year.post');
	    Route::delete('delete', 'AcademicYearController@destroy')->name('admin.academic.year.delete');
	    Route::put('update', 'AcademicYearController@update')->name('admin.academic.year.update');
	 });
	 //------------------------Attendace-------------------------------------------
	Route::group(['prefix' => 'attendance'], function() {
	    Route::group(['prefix' => 'student'], function() {
	        Route::get('/', 'StudentAttendanceController@index')->name('admin.attendance.student.form');
	        Route::post('search', 'StudentAttendanceController@search')->name('admin.attendance.student.search');
	        Route::post('add', 'StudentAttendanceController@store')->name('admin.attendance.student.save');
	        Route::get('{attendance}/edit', 'StudentAttendanceController@edit')->name('admin.attendance.student.edit');
	        Route::post('{attendance}update', 'StudentAttendanceController@update')->name('admin.attendance.student.update');
	        Route::get('{attendance}/delete', 'StudentAttendanceController@destroy')->name('admin.attendance.student.delete');
	        Route::get('attendance-continue', 'StudentAttendanceController@attendanceContinue')->name('admin.attendance.student.attendance.continue');
	    });
	});
	    Route::group(['prefix' => 'student-absent'], function() { 
	        Route::get('student-absent', 'StudentAttendanceController@studentAbsent')->name('admin.attendance.student.absent');
	        Route::get('student-absent-list', 'StudentAttendanceController@studentAbsentList')->name('admin.attendance.student.absent.list');
	        Route::post('student-absent-sms/{id}', 'StudentAttendanceController@studentAbsentSendSms')->name('admin.attendance.student.absent.send.sms');
	        
	    });
	    Route::group(['prefix' => 'attendance-barcode'], function() { 
	        Route::get('barcode', 'StudentAttendanceController@attendanceBarcode')->name('admin.attendance.barcode');
	        Route::get('show', 'StudentAttendanceController@attendanceBarcodeshow')->name('admin.attendance.barcode.show');
	        Route::post('save', 'StudentAttendanceController@attendanceBarcodeSave')->name('admin.attendance.barcode.save');
	        
	    });
	//------------------------- Finance ---------------------------------
	Route::group(['prefix' => 'finance'], function() {
		//------------------------- fee acoout ---------------------------------
		Route::group(['prefix' => 'fee-account'], function() {
		    Route::get('/', 'FeeAccountController@index')->name('admin.feeAcount.list');	 	
		    Route::post('add', 'FeeAccountController@store')->name('admin.feeAcount.post');
		    Route::delete('delete', 'FeeAccountController@destroy')->name('admin.feeAcount.delete');
		    Route::put('update', 'FeeAccountController@update')->name('admin.feeAcount.update');
		 });
		//------------------------- Fine scheme ---------------------------------
		Route::group(['prefix' => 'fine-scheme'], function() {
		    Route::get('/', 'FineSchemeController@index')->name('admin.fineScheme.list');	 	
		    Route::post('add', 'FineSchemeController@store')->name('admin.fineScheme.post');
		    Route::delete('delete', 'FineSchemeController@destroy')->name('admin.fineScheme.delete');
		    Route::put('update', 'FineSchemeController@update')->name('admin.fineScheme.update');
		 });
		//------------------------- fee structure ---------------------------------
		Route::group(['prefix' => 'fee-structure'], function() {
		    Route::get('/', 'FeeStructureController@index')->name('admin.feeStructure.list');		     	 	
		    Route::post('add', 'FeeStructureController@store')->name('admin.feeStructure.post');
		    Route::delete('delete', 'FeeStructureController@destroy')->name('admin.feeStructure.delete');
		    Route::put('update', 'FeeStructureController@update')->name('admin.feeStructure.update');
		 });
		//------------------------- fee structure amount ---------------------------------
		Route::group(['prefix' => 'fee-structure-amount'], function() {
		    Route::get('/', 'FeeStructureAmountController@index')->name('admin.feeStructureAmount.list');
		    Route::get('amount', 'FeeStructureAmountController@amount')->name('admin.feeStructureAmount.amount');
		    Route::get('search', 'FeeStructureAmountController@search')->name('admin.feeStructureAmount.search'); 	
		    Route::post('add', 'FeeStructureAmountController@store')->name('admin.feeStructureAmount.post');
		    Route::delete('delete', 'FeeStructureAmountController@destroy')->name('admin.feeStructureAmount.delete');
		    Route::put('update', 'FeeStructureAmountController@update')->name('admin.feeStructureAmount.update');
		 });//------------------------- fee structure amount ---------------------------------
	    Route::group(['prefix' => 'fee-structure-last-date'], function() {
	        Route::get('/', 'FeeStructureLastDateController@index')->name('admin.feeStructureLastDate.list');	 	
	        Route::post('add', 'FeeStructureLastDateController@store')->name('admin.feeStructureLastDate.post');
	        Route::delete('delete', 'FeeStructureLastDateController@destroy')->name('admin.feeStructureLastDate.delete');
	        Route::put('update', 'FeeStructureLastDateController@update')->name('admin.feeStructureLastDate.update');
	     });
	    //------------------------- class-fee-structure ---------------------------------
	    Route::group(['prefix' => 'class-fee-structure'], function() {
	        Route::get('/', 'ClassFeeStructureController@index')->name('admin.classFeeStructure.list');	 	
	        Route::get('form', 'ClassFeeStructureController@form')->name('admin.classFeeStructureForm');
	        Route::get('search', 'ClassFeeStructureController@search')->name('admin.classFeeStructure.search');
	        Route::get('save-show', 'ClassFeeStructureController@saveshow')->name('admin.classFeeStructure.saveShow');	        	 	
	        Route::post('stores', 'ClassFeeStructureController@stores')->name('admin.classFeeStructure.stores');	 	
	        Route::post('add', 'ClassFeeStructureController@store')->name('admin.classFeeStructure.post');
	        Route::post('isApplicable', 'ClassFeeStructureController@isApplicable')->name('admin.classFeeStructure.isApplicable');
	        Route::delete('delete', 'ClassFeeStructureController@destroy')->name('admin.classFeeStructure.delete');
	     });//------------------------- fee-group ---------------------------------
	    Route::group(['prefix' => 'fee-group'], function() {
		    Route::get('/', 'FeeGroupController@index')->name('admin.feeGroup.list');	 	
		    Route::post('add', 'FeeGroupController@store')->name('admin.feeGroup.post');
		    Route::delete('delete', 'FeeGroupController@destroy')->name('admin.feeGroup.delete');
		    Route::put('update', 'FeeGroupController@update')->name('admin.feeGroup.update');
		 });//------------------------- fee-group-detailt ---------------------------------
        Route::group(['prefix' => 'fee-group-detail'], function() {
    	    Route::get('/', 'FeeGroupDetailController@index')->name('admin.feeGroupDetail.list');	 
	        Route::post('search', 'FeeGroupDetailController@search')->name('admin.feeGroupDetail.search'); 
    	    Route::post('add', 'FeeGroupDetailController@store')->name('admin.feeGroupDetail.post');
    	    Route::delete('delete', 'FeeGroupDetailController@destroy')->name('admin.feeGroupDetail.delete');
    	    Route::put('update', 'FeeGroupDetailController@update')->name('admin.feeGroupDetail.update');
    	 });//------------------------- concession ---------------------------------
        Route::group(['prefix' => 'concession'], function() {
    	    Route::get('/', 'ConcessionController@index')->name('admin.concession.list');	 	
    	    Route::post('add', 'ConcessionController@store')->name('admin.concession.post');
    	    Route::delete('delete', 'ConcessionController@destroy')->name('admin.concession.delete');
    	    Route::put('update', 'ConcessionController@update')->name('admin.concession.update');
    	    Route::get('search', 'ConcessionController@search')->name('admin.concession.search');
    	 });//------------------------- student-fee-detail ---------------------------------
        Route::group(['prefix' => 'student-fee-detail'], function() {
    	    Route::get('/', 'StudentFeeDetailController@index')->name('admin.studentFeeDetail.list'); 
    	    Route::post('add', 'StudentFeeDetailController@store')->name('admin.studentFeeDetail.post');
    	    Route::get('delete/{studentFeeDetail}', 'StudentFeeDetailController@destroy')->name('admin.studentFeeDetail.delete');
    	    Route::put('update', 'StudentFeeDetailController@update')->name('admin.studentFeeDetail.update');
    	    Route::get('assign', 'StudentFeeDetailController@feeassignlist')->name('admin.studentFeeAssign.list');
    	    Route::post('assign/show/{menu_id}', 'StudentFeeDetailController@feeassignshow')->name('admin.studentFeeAssign.show');
    	    Route::post('assign/store', 'StudentFeeDetailController@assignstore')->name('admin.studentFeeAssign.post');
    	    Route::get('show-fee-struture-model/{id}', 'StudentFeeDetailController@showFeeStructureModel')->name('admin.studentFeeStructure.show.model');
    	    Route::post('show-fee-struture-store/{id}', 'StudentFeeDetailController@feeStructureStore')->name('admin.studentFeeStructure.details.store');
    	     Route::get('show-fee-Concession-model/{id}', 'StudentFeeDetailController@showFeeDetailConcessionModel')->name('admin.studentFeeStructure.Concession.show.model');
    	      Route::post('show-fee-struture-concession-store/{id}', 'StudentFeeDetailController@feeconcessioneStore')->name('admin.studentFee.details.concession.store');
    	      Route::get('previous-reciept-model-show', 'StudentFeeDetailController@previousRecieptModel')->name('admin.privious.reciept.show.model');
    	 });
    	 //------------------------- StudentFeeGroupDetail --------------------------------- 
    	Route::group(['prefix' => 'fee-group-wise'], function() {
    	    Route::get('/', 'StudentFeeGroupDetailController@index')->name('admin.studentFeeGroupDetail.list');	 	
    	    Route::get('show', 'StudentFeeGroupDetailController@show')->name('admin.studentFeeGroupDetail.show');	 	
    	    Route::post('add', 'StudentFeeGroupDetailController@store')->name('admin.studentFeeGroupDetail.post');
    	    Route::post('search', 'StudentFeeGroupDetailController@search')->name('admin.studentFeeGroupDetail.search');
    	    Route::delete('delete', 'StudentFeeGroupDetailController@destroy')->name('admin.studentFeeGroupDetail.delete');
    	    Route::put('update', 'StudentFeeGroupDetailController@update')->name('admin.studentFeeGroupDetail.update');
    	 });
    	 //------------------------- Fee Collection --------------------------------- 
    	Route::group(['prefix' => 'fee-collection'], function() {
    	    Route::get('/', 'Fee\FeeCollectionController@index')->name('admin.studentFeeCollection.list');	 	
    	    Route::get('show', 'Fee\FeeCollectionController@show')->name('admin.studentFeeCollection.show');
    	    Route::get('show-fee-detail', 'Fee\FeeCollectionController@showfeedetail')->name('admin.studentFeeCollection.showFeeDetail');

    	    Route::post('add', 'Fee\FeeCollectionController@store')->name('admin.studentFeeCollection.post');
    	    Route::post('print', 'Fee\FeeCollectionController@print')->name('admin.studentFeeCollection.print');
    	    Route::post('print2', 'Fee\FeeCollectionController@print')->name('admin.studentFeeCollection.print2');
    	    Route::get('fee-detail', 'Fee\FeeCollectionController@feeDetail')->name('admin.studentFeeCollection.search');
    	    Route::delete('delete', 'Fee\FeeCollectionController@destroy')->name('admin.studentFeeCollection.delete');
    	    Route::put('update', 'Fee\FeeCollectionController@update')->name('admin.studentFeeCollection.update');
    	    Route::get('fine', 'Fee\FeeCollectionController@fineScheme')->name('admin.studentFeeCollection.fine.scheme');
    	 });
    	 //------------------------- Fee Cashbook --------------------------------- 
    	Route::group(['prefix' => 'cashbook'], function() {
    	    Route::get('/', 'Fee\CashbookController@index')->name('admin.cashbook.list');	 	
    	    Route::post('daterange', 'Fee\CashbookController@daterange')->name('admin.cashbook.daterange');	 	
    	    Route::get('print/{student_id}', 'Fee\CashbookController@printReciept')->name('admin.cashbook.print'); 
    	    Route::get('cancel/{cashbook}', 'Fee\CashbookController@cancelRecietp')->name('admin.cashbook.cancel'); 
    	 });
    	 //------------------------- Fee Due filder --------------------------------- 
    	Route::group(['prefix' => 'fee-due'], function() {
    	    Route::get('/', 'Fee\FeeDueController@index')->name('admin.feeDue.list');	 	
    	    Route::post('filter', 'Fee\FeeDueController@filter')->name('admin.feeDue.filter');	 	
    	      
    	    
    	 });
    	Route::group(['prefix' => 'finance-report'], function() {
    	    Route::get('/', 'FinanceReportController@index')->name('admin.finance.report');	 	
    	    Route::get('fee-report', 'FinanceReportController@feeReport')->name('admin.finance.report.fee.report');	 	
    	    Route::post('report-show', 'FinanceReportController@feeReportShow')->name('admin.finance.report.fee.report.show');	 	
    	    
    	      
    	    
    	 });Route::group(['prefix' => 'date-range'], function() {
    	    Route::get('date-range', 'FinanceReportController@dateRange')->name('admin.finance.report.date.range'); 
    	 });
    	Route::group(['prefix' => 'fee-due-report'], function() {
    	    Route::get('fee-due', 'FinanceReportController@feeDueReport')->name('admin.finance.report.fee-due'); 
    	    Route::post('fee-due-show', 'FinanceReportController@feeDueReportShow')->name('admin.finance.report.fee.due.show'); 
    	    Route::get('fee-due-receipt/{id}', 'FinanceReportController@feeDueReportReceipt')->name('admin.finance.report.fee.due.receipt'); 
    	  });
    	Route::group(['prefix' => 'adminssion-report'], function() {
    	    Route::get('admission', 'FinanceReportController@adminssionReport')->name('admin.finance.report.adminssion'); 
    	    Route::post('admission-show', 'FinanceReportController@adminssionReportShow')->name('admin.finance.report.adminssion.show'); 
    	  });
     

    	 //------------------------- Student Search --------------------------------- 
    	Route::group(['prefix' => 'search'], function() {
    	    Route::get('/', 'StudentSearchController@index')->name('admin.student.search.form');	 	
    	    Route::post('data', 'StudentSearchController@search')->name('admin.student.search');	 	
    	    Route::get('find', 'StudentSearchController@find')->name('admin.student.find');	 	
    	    
    	 });
    	  //------------------------- online Form list --------------------------------- 
    	Route::group(['prefix' => 'registration-form'], function() {
    	    Route::get('/', 'Registration\RegistrationController@index')->name('admin.onlineForm.list');	 	
    	    Route::get('cancel/{id}', 'Registration\RegistrationController@statusCancel')->name('registration.cancel');	 	
    	    Route::get('rejcet/{id}', 'Registration\RegistrationController@statusReject')->name('registration.reject');	 	
    	    Route::get('approved/{id}', 'Registration\RegistrationController@statusApproved')->name('registration.approved');
    	    Route::get('approved-show', 'Registration\RegistrationController@approvedShow')->name('registration.approved.show');	 	
    	    Route::post('/', 'Registration\RegistrationController@remarkAdd')->name('registration.remark.add');	 	
    	    Route::get('show-remark', 'Registration\RegistrationController@remarkShow')->name('registration.remark.show');
    	    Route::post('report', 'Registration\RegistrationController@report')->name('admin.registration.report.post'); 
    	    Route::get('allowadmission/{id}', 'Registration\RegistrationController@allowadmission')->name('admin.registration.allowadmission'); 
            Route::post('copy-registration-data/{id}', 'Registration\RegistrationController@copyRegistrationData')->name('admin.registration.copyToStudent'); 
    	    
    	 	});
		 });

		Route::group(['prefix' => 'transport'], function() {
			//------------------------- Transport ---------------------------------
			Route::group(['prefix' => 'transport'], function() {
			    Route::get('/', 'Transport\TransportController@index')->name('admin.transport.list');	 	
			    Route::post('add', 'Transport\TransportController@store')->name('admin.transport.post');
			    Route::get('delete/{id}', 'Transport\TransportController@destroy')->name('admin.transport.delete');
			    Route::get('edit/{id}', 'Transport\TransportController@edit')->name('admin.transport.edit');
			    Route::post('update/{id}', 'Transport\TransportController@update')->name('admin.transport.update');
			 });
			 //------------------------- vehicle ---------------------------------
			Route::group(['prefix' => 'vehicle'], function() {
			    Route::get('/', 'Transport\VehicleController@index')->name('admin.vehicle.list');	 	
			    Route::post('add', 'Transport\VehicleController@store')->name('admin.vehicle.post');
			    Route::get('delete/{id}', 'Transport\VehicleController@destroy')->name('admin.vehicle.delete');
			     Route::get('edit/{id}', 'Transport\VehicleController@edit')->name('admin.vehicle.edit');
			    Route::post('update/{id}', 'Transport\VehicleController@update')->name('admin.vehicle.update');
			 });
			 	 //------------------------- vehicle Type ---------------------------------
			Route::group(['prefix' => 'vehicle-type'], function() {
			    Route::get('/', 'Transport\VehicleController@list')->name('admin.vehicleType.list');	 	
			    Route::post('add', 'Transport\VehicleController@vehicleTypestore')->name('admin.vehicleType.post');
			    Route::get('delete/{id}', 'Transport\VehicleController@vehicleTypedestroy')->name('admin.vehicleType.delete');
			     Route::get('edit/{id}', 'Transport\VehicleController@vehicleTypeedit')->name('admin.vehicleType.edit');
			      Route::post('update/{id}', 'Transport\VehicleController@vehicleTypeupdate')->name('admin.vehicleType.update');
			    
			 });
			 	 //------------------------- Driver ---------------------------------
			Route::group(['prefix' => 'driver'], function() {
			    Route::get('/', 'Transport\DriverController@index')->name('admin.driver.list');	 	
			    Route::post('add', 'Transport\DriverController@store')->name('admin.driver.post');
			    Route::get('delete/{id}', 'Transport\DriverController@destroy')->name('admin.driver.delete');
			    Route::get('edit/{id}', 'Transport\DriverController@edit')->name('admin.driver.edit'); 
			     Route::post('update/{id}', 'Transport\DriverController@update')->name('admin.driver.update'); 
			 });
			 //------------------------- Helper ---------------------------------
			Route::group(['prefix' => 'helper'], function() {
			    Route::get('/', 'Transport\HelperController@index')->name('admin.helper.list');	 	
			    Route::post('add', 'Transport\HelperController@store')->name('admin.helper.post');
			    Route::get('delete/{id}', 'Transport\HelperController@destroy')->name('admin.helper.delete'); 
			    Route::get('edit/{id}', 'Transport\HelperController@edit')->name('admin.helper.edit'); 
			     Route::post('update/{id}', 'Transport\HelperController@update')->name('admin.helper.update'); 
			 });
			  //------------------------- Helper ---------------------------------
			Route::group(['prefix' => 'route'], function() {
			    Route::get('/', 'Transport\RouteController@index')->name('admin.route.list');	 	
			    Route::post('add', 'Transport\RouteController@store')->name('admin.route.post');
			    Route::get('delete/{id}', 'Transport\RouteController@destroy')->name('admin.route.delete'); 
			 });
			   //------------------------- Helper ---------------------------------
			Route::group(['prefix' => 'boarding-point'], function() {
			    Route::get('/', 'Transport\BoardingPointController@index')->name('admin.boardingPoint.list');	 	
			    Route::post('add', 'Transport\BoardingPointController@store')->name('admin.boardingPoint.post');
			    Route::get('delete/{id}', 'Transport\BoardingPointController@destroy')->name('admin.boardingPoint.delete');
			      Route::get('edit/{id}', 'Transport\BoardingPointController@edit')->name('admin.boardingPoint.edit');
			       Route::post('update/{id}', 'Transport\BoardingPointController@update')->name('admin.boardingPoint.update'); 
			 });
			   //------------------------- Helper ---------------------------------
			Route::group(['prefix' => 'route-details'], function() {
			    Route::get('/', 'Transport\RouteDetailsController@index')->name('admin.routeDetails.list');	 	
			    Route::post('add', 'Transport\RouteDetailsController@store')->name('admin.routeDetails.post');
			    Route::get('get', 'Transport\RouteDetailsController@getBoardingPoint')->name('admin.routeDetails.get');
			     Route::get('show', 'Transport\RouteDetailsController@show')->name('admin.routeDetailsView.get');
			    Route::get('delete/{id}', 'Transport\RouteDetailsController@destroy')->name('admin.routesDetail.delete'); 
			 }); 
			    //------------------------- Helper ---------------------------------
			Route::group(['prefix' => 'route-vehicle'], function() {
			    Route::get('/', 'Transport\RouteVehicleController@index')->name('admin.routeVehicle.list');	 	
			    Route::post('add', 'Transport\RouteVehicleController@store')->name('admin.routeVehicle.post');
			    Route::get('get', 'Transport\RouteVehicleController@getVehicle')->name('admin.routeVehicle.get');
			    Route::get('delete/{id}', 'Transport\RouteVehicleController@destroy')->name('admin.routesVehicle.delete'); 
			 }); 
			 
			  //------------------------- Transport Registration ---------------------------------
			Route::group(['prefix' => 'transport-registration'], function() {
			    Route::get('/', 'Transport\TransportRegistrationController@index')->name('admin.transportRegistration.list');	 	
			    Route::post('add', 'Transport\TransportRegistrationController@store')->name('admin.transportRegistration.post');
			    Route::get('delete/{id}', 'Transport\TransportRegistrationController@destroy')->name('admin.transportRegistration.delete'); 
			     Route::get('edit/{id}', 'Transport\TransportRegistrationController@edit')->name('admin.transportRegistration.edit'); 
			 });
		});
		Route::group(['prefix' => 'exam'], function() {	
			  //------------------------- Exam Test ---------------------------------
			Route::group(['prefix' => 'class-test'], function() {
			    Route::get('/', 'Exam\ClassTestController@index')->name('admin.exam.test');	 	
			    Route::get('add-form', 'Exam\ClassTestController@addForm')->name('admin.exam.test.add.form');	 	
			    Route::post('store', 'Exam\ClassTestController@store')->name('admin.exam.classtest.store');	 	
			    Route::post('table-show', 'Exam\ClassTestController@tableShow')->name('admin.exam.classtest.table.show'); 
			    Route::get('delete/{id}', 'Exam\ClassTestController@destroy')->name('admin.exam.classtest.delete');
			    Route::get('send-sms/{class_id}/{section_id}/{id}', 'Exam\ClassTestController@sendSms')->name('admin.exam.classtest.send.sms');	 	
			    Route::get('send-email/{class_id}/{section_id}/{id}', 'Exam\ClassTestController@sendEmail')->name('admin.exam.classtest.send.email');	 	
			    
			 });
			   //------------------------- Exam Test Details ---------------------------------
			Route::group(['prefix' => 'class-detail'], function() {
			    Route::get('/', 'Exam\ClassTestDetailController@index')->name('admin.exam.test.details');	 	
			    Route::post('store', 'Exam\ClassTestDetailController@store')->name('admin.exam.classdetail.store');	
			    Route::get('delete/{id}', 'Exam\ClassTestDetailController@destroy')->name('admin.exam.classdetail.delete');	 	
			    Route::get('search', 'Exam\ClassTestDetailController@searchStudent')->name('admin.classdetail.studentSearch');
			    Route::get('compile/{id}', 'Exam\ClassTestDetailController@compile')->name('admin.exam.classtest.compile');	 	
			    Route::get('todays-class-test', 'Exam\ClassTestDetailController@todayClassTest')->name('admin.exam.today.class.test');	 	
			    Route::get('upcoming-class-test', 'Exam\ClassTestDetailController@upcomingClassTest')->name('admin.exam.upcoming.class.test');	 	
			    
			 });
			  //------------------------- Exam Term ---------------------------------
			Route::group(['prefix' => 'exam-term'], function() {
			    Route::get('/', 'Exam\ExamTermController@index')->name('admin.exam.term');	 	
			    Route::post('store', 'Exam\ExamTermController@store')->name('admin.exam.term.store');	 	
			    Route::get('delete/{id}', 'Exam\ExamTermController@destroy')->name('admin.exam.term.delete');
			 });
			  //------------------------- Exam Schedule ---------------------------------
			Route::group(['prefix' => 'exam-schedule'], function() {
			    Route::get('/', 'Exam\ExamScheduleController@index')->name('admin.exam.schedule');	 	
			    Route::post('store', 'Exam\ExamScheduleController@store')->name('admin.exam.schedule.store');	 	
			    Route::get('delete/{id}', 'Exam\ExamScheduleController@destroy')->name('admin.exam.schedule.delete');
			    Route::get('send-sms/{id}', 'Exam\ExamScheduleController@sendSms')->name('admin.exam.schedule.send.sms');
			    Route::get('send-email/{id}', 'Exam\ExamScheduleController@SendEmail')->name('admin.exam.schedule.send.email');
			 });
			  //------------------------- Exam marks details ---------------------------------
			Route::group(['prefix' => 'exam-marks-details'], function() {
			    Route::get('/', 'Exam\MarkDetailController@index')->name('admin.exam.mark.detail');	 	
			    Route::post('store', 'Exam\MarkDetailController@store')->name('admin.exam.mark.detail.store');	 	
			    Route::get('delete/{id}', 'Exam\MarkDetailController@destroy')->name('admin.exam.mark.detail.delete');
			    Route::get('search', 'Exam\MarkDetailController@searchStudent')->name('admin.mark.detail.studentSearch');
			 });
			//-------------------------------Student remark------------------------------------
			Route::group(['prefix' => 'student-remark'], function() {
			    Route::get('/', 'StudentRemarkController@index')->name('admin.student.remark.detail');	 	
			    Route::get('search', 'StudentRemarkController@search')->name('admin.student.remark.detail.search');
			    Route::get('add-remark/{id}', 'StudentRemarkController@addRemark')->name('admin.student.remark.detail.add.btn');
			    Route::post('remark-store/{id}', 'StudentRemarkController@remarkStore')->name('admin.student.remark.detail.store');	 	
			    
			 });
			  //------------------------- Exam marks details ---------------------------------
			Route::group(['prefix' => 'grade'], function() {
			    Route::get('grade', 'Exam\GradeDetailController@grade')->name('admin.exam.grade');	 	
			    Route::post('grade-store', 'Exam\GradeDetailController@gradeStore')->name('admin.exam.grade.detail.grade.store');	 	
			     	 	
			     
			 });
			Route::group(['prefix' => 'grade-details'], function() {
			    Route::get('/', 'Exam\GradeDetailController@index')->name('admin.exam.grade.detail');	 	
			    Route::post('store', 'Exam\GradeDetailController@store')->name('admin.exam.grade.detail.store');	 	
			    Route::get('delete/{id}', 'Exam\GradeDetailController@destroy')->name('admin.exam.mark.grade.delete');
			 });
			Route::group(['prefix' => 'class-test-report'], function() {
			   Route::get('/', 'Exam\ExamReportController@index')->name('admin.exam.report'); 
			   Route::post('filter', 'Exam\ExamReportController@filter')->name('admin.exam.report.filter');	 	
			   Route::get('print', 'Exam\ExamReportController@print')->name('admin.exam.report.print');	 	
			     
			 });
			Route::group(['prefix' => 'exam-report'], function() {
			   Route::get('exam-report', 'Exam\ExamReportController@examReport')->name('admin.exam.exam.report'); 
			   Route::post('exam-report-filter', 'Exam\ExamReportController@examReportFilter')->name('admin.exam.exam.report.filter'); 
			   Route::get('exam-report-print', 'Exam\ExamReportController@examReportPrint')->name('admin.exam.exam.report.print'); 
			    
			     
			 });
			Route::group(['prefix' => 'teacher-remark'], function() {
			    Route::get('/', 'Exam\TeacherRemarkController@index')->name('admin.exam.teacher.remark');	 	
			    Route::post('store', 'Exam\TeacherRemarkController@store')->name('admin.exam.teacher.remark.store');	 	
			    Route::get('table-show', 'Exam\TeacherRemarkController@tableShow')->name('admin.exam.teacher.remark.table.show');	 	
			     
			 });
			   //------------------------- Income ---------------------------------
			Route::group(['prefix' => 'incomeSlab'], function() {
			    Route::get('/', 'MasterController@incomeSlab')->name('admin.incomeSlab.list');	 	
			    Route::post('store', 'MasterController@incomeSlabStore')->name('admin.incomeSlab.store'); });
			    Route::get('edit/{id}', 'MasterController@incomeSlabEdit')->name('admin.incomeSlab.edit');
			    Route::post('update/{id}', 'MasterController@incomeSlabUpdate')->name('admin.incomeSlab.update');
			    Route::get('delete/{id}', 'MasterController@incomeSlabDestroy')->name('admin.incomeSlab.delete');

			}); 
		    Route::group(['prefix' => 'guardian'], function() {
			    Route::get('guardian', 'MasterController@guardian')->name('admin.guardian.list');	 	
			    Route::post('guardian-store', 'MasterController@guardianStore')->name('admin.guardian.store');	 	
			    Route::get('guardian-edit/{id}', 'MasterController@guardianEdit')->name('admin.guardian.edit');	 	
			    Route::get('guardian-delete/{id}', 'MasterController@guardianDelete')->name('admin.guardian.delete');	 	
			    Route::post('guardian-update/{id}', 'MasterController@guardianUpdate')->name('admin.guardian.update');	 	
			    	 	
			    

			});   //------------------------- Profession ---------------------------------
			Route::group(['prefix' => 'profession'], function() {
			    Route::get('/', 'MasterController@profession')->name('admin.profession.list');	 	
			    Route::post('store', 'MasterController@professionStore')->name('admin.profession.store');
			    Route::get('edit/{id}', 'MasterController@professionEdit')->name('admin.profession.edit');
			    Route::post('update/{id}', 'MasterController@professionUpdate')->name('admin.profession.update');
			    Route::get('delete/{id}', 'MasterController@professionDestroy')->name('admin.profession.delete');

			});	
			//------------------------- SMS ---------------------------------
			Route::group(['prefix' => 'sms'], function() {
			    Route::get('/', 'Sms\SmsController@index')->name('admin.sms.form');	 	
			    Route::post('send', 'Sms\SmsController@smsSend')->name('admin.sms.sendSms'); 
			    Route::post('quick-sms', 'Sms\SmsController@quickSms')->name('admin.quick.sms'); 
			    Route::get('send-report', 'Sms\SmsController@smsReport')->name('admin.sms.smsReport'); 
			    Route::post('quick-email', 'Sms\SmsController@quickEmail')->name('admin.quick.email');
			    Route::get('sms-template', 'Sms\SmsController@smsTemplate')->name('admin.sms.template');
			    Route::get('sms-template-add/{id}', 'Sms\SmsController@smsTemplateAdd')->name('admin.sms.template.add');
			    Route::post('sms-template-store', 'Sms\SmsController@smsTemplateStore')->name('admin.sms.template.store');
			    Route::get('sms-template-table/{id}', 'Sms\SmsController@smsTemplateTable')->name('admin.sms.template.table');
			    Route::get('sms-template-edit/{id}', 'Sms\SmsController@smsTemplateEdit')->name('admin.sms.template.edit');
			    Route::get('sms-template-delete/{id}', 'Sms\SmsController@smsTemplateDestroy')->name('admin.sms.template.delete');
			    Route::get('sms-template-view/{id}', 'Sms\SmsController@smsTemplateView')->name('admin.sms.template.view');
			    Route::post('sms-template-update/{id}', 'Sms\SmsController@smsTemplateUpdate')->name('admin.sms.template.update');

			    Route::get('email-template', 'Sms\SmsController@emailTemplate')->name('admin.email.template');
			    Route::get('email-template-addform/{id}', 'Sms\SmsController@emailTemplateAddForm')->name('admin.email.template.addform');
			    Route::post('email-template-store', 'Sms\SmsController@emailTemplateStore')->name('admin.email.template.store');
			    Route::get('email-template-table/{id}', 'Sms\SmsController@emailTemplateTable')->name('admin.email.template.table');
			    Route::get('email-template-edit/{id}', 'Sms\SmsController@emailTemplateEdit')->name('admin.email.template.edit');
			    Route::get('email-template-delete/{id}', 'Sms\SmsController@emailTemplateDestroy')->name('admin.email.template.delete');
			    Route::post('email-template-update/{id}', 'Sms\SmsController@emailTemplateUpdate')->name('admin.email.template.update');
			    Route::get('email-template-view/{id}', 'Sms\SmsController@emailTemplateView')->name('admin.email.template.view');
                
			});	

			Route::group(['prefix' => 'barcode'], function() {
			    Route::get('/', 'Barcode\BarcodeController@index')->name('admin.barcode.view');
			    Route::post('barcode-Generator', 'Barcode\BarcodeController@barcodeGenerator')->name('barcode.Generator');
			});
                //-----------------library menegment----------------
			Route::group(['prefix' => 'library-publisher'], function() {

			    Route::get('publisher-details', 'Library\LibraryController@index')->name('admin.library.publisher.details');
			    Route::get('add-form', 'Library\LibraryController@addForm')->name('admin.library.publisher.details.addform'); 
			    Route::post('store', 'Library\LibraryController@store')->name('admin.library.publisher.details.store');
			    Route::get('table-show', 'Library\LibraryController@tableShow')->name('admin.library.publisher.details.table.show'); 
			    Route::get('delete/{id}', 'Library\LibraryController@destroy')->name('admin.library.publisher.details.delete'); 
			    Route::get('edit/{id}', 'Library\LibraryController@edit')->name('admin.library.publisher.details.edit');

                Route::post('update/{id}', 'Library\LibraryController@update')->name('admin.library.publisher.details.update'); 
			    
			});
			//-----------------Author Details----------------------------------
			Route::group(['prefix' => 'author'], function() {
			    Route::get('/', 'Library\AuthorController@index')->name('admin.library.author.details');
			    Route::get('add-form', 'Library\AuthorController@addForm')->name('admin.library.author.details.addform');
			    Route::post('store', 'Library\AuthorController@store')->name('admin.library.author.details.store');
			    Route::get('table-show', 'Library\AuthorController@tableShow')->name('admin.library.author.details.table.show');
			    Route::get('delete/{id}', 'Library\AuthorController@destroy')->name('admin.library.author.details.delete');
			    Route::get('edit/{id}', 'Library\AuthorController@edit')->name('admin.library.author.details.edit');
			    Route::post('update/{id}', 'Library\AuthorController@update')->name('admin.library.author.details.update');
			    
			});
			//--------------------Books Details-----------------------------------

			Route::group(['prefix' => 'books'], function() {
			    Route::get('/', 'Library\BooksController@index')->name('admin.library.book.details');
			    Route::get('add-form', 'Library\BooksController@addForm')->name('admin.library.book.details.addform');
			    Route::post('store', 'Library\BooksController@store')->name('admin.library.book.details.store');
			    Route::get('table-show', 'Library\BooksController@tableShow')->name('admin.library.book.details.table.show');
			    Route::get('delete/{id}', 'Library\BooksController@destroy')->name('admin.library.book.details.delete');
			    Route::get('edit/{id}', 'Library\BooksController@edit')->name('admin.library.book.details.edit');
			    Route::post('update/{id}', 'Library\BooksController@update')->name('admin.library.book.details.update');
			    
			});
			Route::group(['prefix' => 'book-purchase-bill'], function() {
			    Route::get('/', 'Library\BookPurchaseBillController@index')->name('admin.library.book.book.purchase.bill');
			    Route::get('add-form', 'Library\BookPurchaseBillController@addForm')->name('admin.library.book.purchase.addform');
			    Route::post('store', 'Library\BookPurchaseBillController@store')->name('admin.library.book.book.purchase.bill.store');
                Route::get('table-show', 'Library\BookPurchaseBillController@tableShow')->name('admin.library.book.purchase.table.show');
                Route::get('edit/{id}', 'Library\BookPurchaseBillController@edit')->name('admin.library.purchase.details.edit');
                Route::get('delete/{id}', 'Library\BookPurchaseBillController@destroy')->name('admin.library.purchase.details.delete');
                Route::post('update/{id}', 'Library\BookPurchaseBillController@update')->name('admin.library.book.purchase.details.update');

		    });
		    Route::group(['prefix' => 'book-accession'], function() {
			 Route::get('/', 'Library\bookAccessionController@index')->name('admin.library.book.accession.details');
			  Route::get('add-form', 'Library\bookAccessionController@addForm')->name('admin.library.book.accession.addform'); 
			 Route::post('store', 'Library\bookAccessionController@store')->name('admin.library.book.accession.details.store');
			 Route::get('table-show', 'Library\bookAccessionController@tableShow')->name('admin.library.book.accession.table.show'); 
			 Route::get('edit/{id}', 'Library\bookAccessionController@edit')->name('admin.library.book.accession.edit');
			  Route::get('delete/{id}', 'Library\bookAccessionController@destroy')->name('admin.library.book.accession.delete');
             Route::post('update/{id}', 'Library\bookAccessionController@update')->name('admin.library.book.accession.update');
             Route::get('barcode', 'Library\bookAccessionController@accessionNoBarcode')->name('admin.library.book.accession.barcode');
             Route::get('barcode-image/{image}', 'Library\bookAccessionController@accessionNoBarcodeImage')->name('admin.library.book.accession.barcode.image');

		    }); 
		    Route::group(['prefix' => 'library-member-type'], function() {
			    Route::get('/', 'Library\LibraryMemberTypeController@index')->name('admin.library.library.member.type'); 
			Route::get('add-form', 'Library\LibraryMemberTypeController@addForm')->name('admin.library.library.member.type.addform');
            Route::post('store', 'Library\LibraryMemberTypeController@store')->name('admin.library.library.member.type.store');
            Route::get('table-show', 'Library\LibraryMemberTypeController@tableShow')->name('admin.library.member.type.table.show');
            Route::get('edit/{id}', 'Library\LibraryMemberTypeController@edit')->name('admin.library.member.type.edit');
            Route::get('delete/{id}', 'Library\LibraryMemberTypeController@destroy')->name('admin.library.member.type.delete');
            Route::post('update/{id}', 'Library\LibraryMemberTypeController@update')->name('admin.library.member.type.update');

		    });
		     // Route::group(['prefix' => 'ticket-details'], function() {
			    // Route::get('/', 'Library\TicketDetailsController@index')->name('admin.library.ticket.details');
			    // Route::get('search', 'Library\TicketDetailsController@search')->name('admin.library.ticket.issue.details.search');
			    // Route::post('store', 'Library\TicketDetailsController@store')->name('admin.library.ticket.details.store');
			   
			    // Route::get('ticket-add/{id}', 'Library\TicketDetailsController@ticketAdd')->name('admin.library.ticket.add');
			    // Route::get('delete/{id}', 'Library\TicketDetailsController@destroy')->name('admin.library.ticket.details.delete');
			    // Route::post('update/{id}', 'Library\TicketDetailsController@update')->name('admin.library.ticket.details.update');


			 // });  
		    Route::group(['prefix' => 'member-ship-facility'], function() {
			  Route::get('/', 'Library\MemberShipFacilityController@index')->name('admin.library.member.ship.facility');
			  Route::get('add-form', 'Library\MemberShipFacilityController@addForm')->name('admin.library.member.ship.facility.addform');
			  Route::get('onchange', 'Library\MemberShipFacilityController@onchange')->name('member.ship.facility.onchange');
			    Route::post('store', 'Library\MemberShipFacilityController@store')->name('admin.library.member.ship.facility.store'); 
			    Route::get('table-show', 'Library\MemberShipFacilityController@tableShow')->name('admin.library.member.ship.facility.table.show');
			    Route::get('edit/{id}', 'Library\MemberShipFacilityController@edit')->name('admin.library.member.ship.facility.edit');
			    Route::get('delete/{id}', 'Library\MemberShipFacilityController@destroy')->name('admin.library.member.ship.facility.delete');
			    Route::post('update/{id}', 'Library\MemberShipFacilityController@update')->name('admin.library.member.ship.facility.Update');

		    });
		     Route::group(['prefix' => 'member-ship-details'], function() {
			    Route::get('/', 'Library\MemberShipDetailsController@index')->name('admin.library.member.ship.details');
			    Route::post('store', 'Library\MemberShipDetailsController@store')->name('admin.library.member.ship.details.store'); 
			    Route::get('student-search', 'Library\MemberShipDetailsController@studentSearch')->name('admin.library.member.ship.details.student.search');
			    Route::get('stadmin.library.book.reserve.accession.wiseudent-show', 'Library\MemberShipDetailsController@studentShow')->name('admin.library.member.ship.details.student.show');
			     Route::get('ticket-show', 'Library\MemberShipDetailsController@ticketDetailsShow')->name('admin.library.ticket.details.show');
			     Route::post('ticket-store', 'Library\MemberShipDetailsController@ticketDetailsStore')->name('admin.library.member.registration.ticket.details.store'); 
		    });
		      Route::group(['prefix' => 'book-reserve-request'], function() {
			    Route::get('/', 'Library\BookReserveRequestController@index')->name('admin.library.book.reserve.request');
			    Route::get('add-form', 'Library\BookReserveRequestController@addForm')->name('admin.library.book.reserve.request.addform'); 
			    Route::get('book-accession', 'Library\BookReserveRequestController@bookAccession')->name('admin.library.book.reserve.accession.wise');

			    Route::get('gegistration-wise-history', 'Library\BookReserveRequestController@registrationWiseHistory')->name('admin.library.book.reserve.registration.wise.history');

			     Route::get('book-accession-wise-history', 'Library\BookReserveRequestController@bookAccessionWiseHistory')->name('admin.library.book.reserve.accession.wise.history');

			    Route::post('store', 'Library\BookReserveRequestController@store')->name('admin.library.book.request.date.store'); 
			    Route::get('table-show', 'Library\BookReserveRequestController@tableShow')->name('admin.library.book.reserve.table.show'); 
			    Route::get('cancel-upto-date', 'Library\BookReserveRequestController@cancelUpToDate')->name('admin.library.book.reserve.cancel.upto.date'); 
			    Route::get('cancel/{id}', 'Library\BookReserveRequestController@cancel')->name('admin.library.book.reserve.cancel');
			    
            }); 

	      Route::group(['prefix' => 'book-issue-details'], function() {
		    Route::get('/', 'Library\BookIssueDetailsController@index')->name('admin.library.book.issue.details');
		    Route::post('store', 'Library\BookIssueDetailsController@store')->name('admin.library.book.issue.details.store'); 
		    Route::get('registration-onchange', 'Library\BookIssueDetailsController@registrationOnchange')->name('admin.library.book.issue.onchange.registration.details');
		    Route::get('accession-onchange', 'Library\BookIssueDetailsController@accessionOnchange')->name('admin.library.book.issue.onchange.accession.details');
		    Route::get('book-issue-history/{id}', 'Library\BookIssueDetailsController@bookIssueHistory')->name('admin.library.book.issue.history');

			     
            });  Route::group(['prefix' => 'book-return'], function() {
		    Route::get('book-return', 'Library\BookIssueDetailsController@bookReturn')->name('admin.library.book.return'); 
		    Route::post('book-search', 'Library\BookIssueDetailsController@bookSearch')->name('admin.library.book.issue.details.search');
		    Route::get('return/{id}', 'Library\BookIssueDetailsController@returnUpdate')->name('admin.library.book.issue.return'); 
			     
            }); 
            Route::group(['prefix' => 'ticket-card'], function() {
		    Route::get('/', 'Library\TicketController@index')->name('admin.library.ticket.card'); 
		    Route::post('generate', 'Library\TicketController@generate')->name('admin.library.ticket.card.generate'); 
		    Route::get('barcode/{barcode}', 'Library\TicketController@barcode')->name('admin.library.ticket.card.barcode'); 
		     
			     
            }); 
		      Route::group(['prefix' => 'event-type'], function() {
			    Route::get('/', 'Event\EventTypeController@index')->name('admin.event.type');
			    Route::post('store', 'Event\EventTypeController@store')->name('admin.event.type.store');
			    Route::get('event-add', 'Event\EventTypeController@addEventType')->name('admin.event.type.add.form');
			    Route::get('table-show', 'Event\EventTypeController@tableShow')->name('admin.event.type.table.show');
			    Route::get('edit/{id}', 'Event\EventTypeController@edit')->name('admin.event.type.edit');
			    Route::get('delete/{id}', 'Event\EventTypeController@destroy')->name('admin.event.type.delete');
			    Route::post('update/{id}', 'Event\EventTypeController@update')->name('admin.event.type.update'); 
			    
			     
            });
              Route::group(['prefix' => 'event-details'], function() {
			   Route::get('/', 'Event\EventDetailsController@index')->name('admin.event.details');
			    Route::get('add-form', 'Event\EventDetailsController@addForm')->name('admin.event.details.add.form'); 
			    Route::get('onchange', 'Event\EventDetailsController@onChange')->name('admin.event.details.onchange'); 
			    Route::post('store', 'Event\EventDetailsController@store')->name('admin.event.details.store'); 
			    Route::get('table-show', 'Event\EventDetailsController@tableShow')->name('admin.event.details.table.show');
			    Route::get('edit/{id}', 'Event\EventDetailsController@edit')->name('admin.event.details.edit');
			    Route::get('delete/{id}', 'Event\EventDetailsController@destroy')->name('admin.event.details.delete');
			    Route::post('update/{id}', 'Event\EventDetailsController@update')->name('admin.event.details.update');
			    Route::get('todays-event/{id}', 'Event\EventDetailsController@todayEventDashboard')->name('admin.event.today.event.dashboard');
			     
			     
            });
               Route::group(['prefix' => 'school-details'], function() {
			    Route::get('/', 'SchoolDetails\SchoolDetailsController@index')->name('admin.school.details');
			    Route::get('add-form', 'SchoolDetails\SchoolDetailsController@addForm')->name('admin.school.details.addForm');
			    Route::post('store', 'SchoolDetails\SchoolDetailsController@store')->name('admin.school.details.store');
			    Route::get('table-show', 'SchoolDetails\SchoolDetailsController@tableShow')->name('admin.school.details.table.show');
			    Route::get('logo/{image}', 'SchoolDetails\SchoolDetailsController@logoImage')->name('admin.student.logo.image');

          });
           Route::group(['prefix' => 'school-dominos'], function() {
			    Route::get('/', 'SchoolDomainController@index')->name('admin.school.dominos');
			    Route::get('add-form', 'SchoolDomainController@addForm')->name('admin.school.dominos.add.form');
			    Route::post('store', 'SchoolDomainController@store')->name('admin.school.dominos.store');
			    Route::get('table-show', 'SchoolDomainController@tableShow')->name('admin.school.dominos.table.show');
			    Route::get('edit/{id}', 'SchoolDomainController@edit')->name('admin.school.dominos.edit');
			    Route::get('delete/{id}', 'SchoolDomainController@destroy')->name('admin.school.dominos.delete');
			    Route::post('update/{id}', 'SchoolDomainController@update')->name('admin.school.dominos.update');
			    

          }); 
           Route::group(['prefix' => 'quotes'], function() {
			    Route::get('quotes', 'SchoolDetails\SchoolDetailsController@quotesindex')->name('admin.school.details.quotes');
			    Route::get('quotes-add', 'SchoolDetails\SchoolDetailsController@quotesAddForm')->name('admin.school.details.quotes.addForm');
			    Route::post('quotes-store', 'SchoolDetails\SchoolDetailsController@quotesStore')->name('admin.school.details.quotes.store');
			    Route::get('quotes-table', 'SchoolDetails\SchoolDetailsController@quotesTableShow')->name('admin.school.details.quotes.table.show');
			    Route::get('quotes-edit/{id}', 'SchoolDetails\SchoolDetailsController@quotesEdit')->name('admin.school.details.quotes.edit');
			    Route::get('quotes-delete/{id}', 'SchoolDetails\SchoolDetailsController@quotesDestroy')->name('admin.school.details.quotes.delete');
			    Route::post('quotes-update/{id}', 'SchoolDetails\SchoolDetailsController@quotesUpdate')->name('admin.school.details.quotes.update');
			     

          }); 
               Route::group(['prefix' => 'student-id-card'], function() {
			    Route::get('/', 'StudentIDCard\StudentIDCardController@index')->name('admin.student.id.card');
			    Route::get('generate-class-wise', 'StudentIDCard\StudentIDCardController@generateClassWise')->name('admin.student.idcard.generate.classwise');
			    Route::get('store', 'StudentIDCard\StudentIDCardController@store')->name('admin.student.idcard.generate.store');
			    

          });
//-------------------------------------Time-Table--------------------------------------------------------------             
              Route::group(['prefix' => 'time-table-type'], function() {

			    Route::get('/', 'TimeTable\TimeTableTypeController@index')->name('admin.time.table.type');
			    Route::post('store', 'TimeTable\TimeTableTypeController@store')->name('admin.time.table.type.store');
			    Route::get('edit/{id}', 'TimeTable\TimeTableTypeController@edit')->name('admin.time.table.type.edit');
			   Route::get('delete/{id}', 'TimeTable\TimeTableTypeController@destroy')->name('admin.time.table.type.delete');
			   Route::post('update/{id}', 'TimeTable\TimeTableTypeController@update')->name('admin.time.table.type.update');
          });
              Route::group(['prefix' => 'preod-timing'], function() {

			    Route::get('/', 'TimeTable\PreodController@index')->name('admin.preod.timing');
			    Route::post('store', 'TimeTable\PreodController@store')->name('admin.preod.timing.store');
			    Route::get('table-show', 'TimeTable\PreodController@tableShow')->name('admin.preod.timing.table.show');
			    Route::get('edit/{id}', 'TimeTable\PreodController@edit')->name('admin.preod.timing.edit');
			    Route::get('delete/{id}', 'TimeTable\PreodController@destroy')->name('admin.preod.timing.delete');
			    Route::post('update/{id}', 'TimeTable\PreodController@update')->name('admin.preod.timing.update');
          });

              Route::group(['prefix' => 'class-period_schedule'], function() {

			    Route::get('/', 'TimeTable\ClassPeriodScheduleController@index')->name('admin.class.period.schedule');
			    Route::get('add-form', 'TimeTable\ClassPeriodScheduleController@addForm')->name('admin.class.period.schedule.addform');
			    Route::get('schedule-show', 'TimeTable\ClassPeriodScheduleController@scheduleShow')->name('admin.class.period.schedule.show');
			     Route::post('store', 'TimeTable\ClassPeriodScheduleController@store')->name('admin.class.period.schedule.store');
		  });    
			  Route::group(['prefix' => 'multiple-class-period_schedule'], function() {

			    Route::get('multiple-class-period_schedule', 'TimeTable\ClassPeriodScheduleController@multipleClassPeriodSchedule')->name('admin.multiple.class.period.schedule');
			    Route::post('multiple-store', 'TimeTable\ClassPeriodScheduleController@multipleClassPeriodScheduleStore')->name('admin.multiple.class.period.schedule.store');
			   
			    
          });
               Route::group(['prefix' => 'class-subject-period'], function() {
               	 Route::get('/', 'TimeTable\ClassSubjectPeriodController@index')->name('admin.class.subject.period');
               	 Route::get('section', 'TimeTable\ClassSubjectPeriodController@classWiseSection')->name('admin.class.subject.period.class.wise.section');
               	 Route::post('store', 'TimeTable\ClassSubjectPeriodController@store')->name('admin.class.subject.period.store');
               	 Route::get('delete/{id}', 'TimeTable\ClassSubjectPeriodController@destroy')->name('admin.class.subject.period.delete');
          });
               Route::group(['prefix' => 'option-subject-group'], function() {
               	 Route::get('option-subject-group', 'TimeTable\ClassSubjectPeriodController@optionSubjectGroup')->name('admin.option.subject.group');
               	 Route::get('subject-show', 'TimeTable\ClassSubjectPeriodController@subjectShow')->name('admin.option.subject.show');
               	 Route::get('table-show', 'TimeTable\ClassSubjectPeriodController@tableShow')->name('admin.option.table.show');
               	 Route::get('subject-delete/{id}', 'TimeTable\ClassSubjectPeriodController@destroySubjectSave')->name('admin.optional.subject.group.delete');
               	 Route::post('subject-store', 'TimeTable\ClassSubjectPeriodController@subjectMoveStore')->name('admin.option.subject.move.store');
          });
               //------------------teacher-details-------------------------------------------------------------------
               Route::group(['prefix' => 'teacher-details'], function() {
               	 Route::get('/', 'TimeTable\TeacherController@index')->name('admin.teacher.details');
               	 Route::get('add-form', 'TimeTable\TeacherController@addForm')->name('admin.teacher.details.add.form');
               	 Route::get('class-section', 'TimeTable\TeacherController@addclassWiseSection')->name('admin.teacher.class.wise.section.addForm');
               	 Route::get('table-show', 'TimeTable\TeacherController@tableShow')->name('admin.teacher.details.table.show'); 
               	 Route::post('store', 'TimeTable\TeacherController@store')->name('admin.teacher.details.store');
               	 Route::get('edit/{id}', 'TimeTable\TeacherController@edit')->name('admin.teacher.details.edit');
               	 Route::get('delete/{id}', 'TimeTable\TeacherController@destroy')->name('admin.teacher.details.delete');
               	 Route::post('update/{id}', 'TimeTable\TeacherController@update')->name('admin.teacher.details.update');
               	 
          });
               Route::group(['prefix' => 'teacher-working-days'], function() {
               	 Route::get('working-days', 'TimeTable\TeacherController@workDays')->name('admin.teacher.working.days');
               	 Route::get('show', 'TimeTable\TeacherController@workingDaysShow')->name('admin.teacher.working.schedule.show');
               	 Route::post('store', 'TimeTable\TeacherController@teacherWorkingStore')->name('admin.teacher.working.schedule.store');
          });
               Route::group(['prefix' => 'multiple-teacher-working-days'], function() {
               	 Route::get('multiple-working-days', 'TimeTable\TeacherController@multipleWorkingDays')->name('admin.teacher.multiple.working.days');
               	 Route::post('multiple-store', 'TimeTable\TeacherController@multipleWorkingDaysStore')->name('admin.teacher.multiple.working.days.store');
               	// Route::get('show', 'TimeTable\TeacherController@workingDaysShow')->name('admin.teacher.working.schedule.show');
               	 // Route::post('store', 'TimeTable\TeacherController@teacherWorkingStore')->name('admin.teacher.working.schedule.store');
          });
               Route::group(['prefix' => 'teacher-subject-class'], function() {
               	 Route::get('class-subject', 'TimeTable\TeacherController@teacherClassSubject')->name('admin.teacher.class.subject');
               	 Route::get('section', 'TimeTable\TeacherController@ClassWiseSection')->name('admin.teacher.class.wise.section');
               	 Route::get('teacher-wise-class', 'TimeTable\TeacherController@teacherWiseClass')->name('admin.teacher.wise.class');
               	 Route::get('teacher-history', 'TimeTable\TeacherController@teacherWiseHistory')->name('admin.teacher.history.table.show');
               	 Route::get('teacher-period', 'TimeTable\TeacherController@SubjectWisePeriod')->name('admin.teacher.subject.wise.period');
               	 Route::get('total-period-lode', 'TimeTable\TeacherController@toTalSubjectWisePeriod')->name('admin.teacher.subject.wise.total.period.history');
               	 Route::get('teacher-period-history', 'TimeTable\TeacherController@SubjectWisePeriodHistory')->name('admin.teacher.subject.wise.period.history');
               	 Route::get('teacher-period-history.delete/{id}', 'TimeTable\TeacherController@SubjectWisePeriodHistoryDestroy')->name('admin.teacher.subject.wise.period.history.delete');
               	 Route::post('teacher-subject-class-store', 'TimeTable\TeacherController@teacherSubjectClassStore')->name('admin.teacher.subject.class.store');

          });
                Route::group(['prefix' => 'teacher-absent'], function() {
                	Route::get('teacher-absent', 'TimeTable\TeacherController@teacherAbsent')->name('admin.teacher.absent');
                	Route::post('teacher-absent-store', 'TimeTable\TeacherController@teacherAbsentStore')->name('admin.teacher.store');
                	Route::get('teacher-absent-delete/{id}', 'TimeTable\TeacherController@teacherAbsentDelete')->name('admin.teacher.absent.dalete');
                	Route::get('teacher-absent-send-sms/{id}', 'TimeTable\TeacherController@teacherAbsentSendSms')->name('admin.teacher.absent.send.sms');
                	Route::post('teacher-absent-sms-email', 'TimeTable\TeacherController@teacherAbsentSendSmsEmail')->name('admin.teacher.absent.send.sms.email');
           });
                Route::group(['prefix' => 'teacher-adjustment'], function() { 
                	Route::get('adjustment', 'TimeTable\TeacherController@adjustment')->name('admin.teacher.adjustment');
                	Route::post('teacher-show', 'TimeTable\TeacherController@teacherAdjustmentShow')->name('admin.teacher.adjustment.show');
                	Route::post('teacher-adjustment', 'TimeTable\TeacherController@teacherAdjustment')->name('admin.teacher.adjustment.result');
                	Route::get('adjustment-teacher-edit/{id}', 'TimeTable\TeacherController@teacherAdjustmentEdit')->name('admin.teacher.adjustment.edit');
                	Route::get('adjustment-teacher-view/{id}', 'TimeTable\TeacherController@teacherAdjustmentView')->name('admin.teacher.adjustment.view');
                	Route::post('adjustment-teacher-update/{id}', 'TimeTable\TeacherController@teacherAdjustmentUpdate')->name('admin.teacher.adjustment.update');
           });
               Route::group(['prefix' => 'room-details'], function() {
               	 Route::get('/', 'Room\RoomController@index')->name('admin.room.details');
               	 Route::post('store', 'Room\RoomController@store')->name('admin.room.details.store');
               	 Route::get('edit/{id}', 'Room\RoomController@edit')->name('admin.room.details.edit');
               	 Route::get('delete/{id}', 'Room\RoomController@destroy')->name('admin.room.details.delete');
               	 Route::post('update/{id}', 'Room\RoomController@update')->name('admin.room.details.update');
          });
           Route::group(['prefix' => 'class-wise-room'], function() {
               	 Route::get('/', 'Room\ClassRoomController@index')->name('admin.class.wise.room.details');
               	 Route::post('store', 'Room\ClassRoomController@store')->name('admin.class.wise.room.store');
               	 Route::get('edit/{id}', 'Room\ClassRoomController@edit')->name('admin.class.wise.room.details.edit');
               	 Route::get('delete/{id}', 'Room\ClassRoomController@destroy')->name('admin.class.wise.room.details.delete');
               	 Route::post('update/{id}', 'Room\ClassRoomController@update')->name('admin.class.wise.room.details.update');
          });
           Route::group(['prefix' => 'subject-wise-room'], function() {
               	 Route::get('subject-room', 'Room\ClassRoomController@subjectWiseRoom')->name('admin.subject.wise.room');
               	 Route::post('subject-room-store', 'Room\ClassRoomController@subjectWiseRoomStore')->name('admin.subject.wise.room.store');
               	 Route::get('edit/{id}', 'Room\ClassRoomController@edit')->name('admin.subject.wise.room.edit');
               	 Route::get('delete/{id}', 'Room\ClassRoomController@Delete')->name('admin.subject.wise.room.delete');
               	 Route::post('update/{id}', 'Room\ClassRoomController@update')->name('admin.subject.wise.room.update');
          });
           Route::group(['prefix' => 'combine-class-subject-group'], function() {
               	 Route::get('/', 'Room\CombineClassSubjectGroupController@index')->name('admin.combine.class.subject.group');
               	 Route::get('class', 'Room\CombineClassSubjectGroupController@subjectWiseClasss')->name('admin.combine.class.select.subject.wise.class');
               	 Route::get('section', 'Room\CombineClassSubjectGroupController@classtWiseSection')->name('admin.combine.class.select.class.wise.section');
               	 Route::get('table-show', 'Room\CombineClassSubjectGroupController@tableShow')->name('admin.combine.class.select.class.wise.table.show');
               	 Route::post('store', 'Room\CombineClassSubjectGroupController@store')->name('admin.combine.class.subject.group.store');
               	 Route::get('delete/{id}', 'Room\CombineClassSubjectGroupController@combineClassSubjectDetailsDestroy')->name('admin.combine.class.subject.details.delete');
          });

           Route::group(['prefix' => 'manual-time-table'], function() {
               	 Route::get('/', 'TimeTable\TimeTablController@index')->name('admin.time.table.generate');
               	 Route::get('manual', 'TimeTable\TimeTablController@manual')->name('admin.time.table.manual');
               	 Route::get('manual-wise-show', 'TimeTable\TimeTablController@manualWiseShow')->name('admin.time.table.manual.subject.show');
               	 Route::get('class-wise-section', 'TimeTable\TimeTablController@classWiseSection')->name('admin.time.table.manual.class.wise.section');
               	 Route::get('subject-wise-teacher', 'TimeTable\TimeTablController@subjectWiseTeacher')->name('admin.time.table.manual.subject.wise.teacher');
               	 Route::get('teacher-wise-period', 'TimeTable\TimeTablController@teacherWisePeriod')->name('admin.time.table.manual.teacher.wise.day.period');
               	 Route::get('day-wise-period', 'TimeTable\TimeTablController@daysWisePeriod')->name('admin.time.table.manual.day.wise.period');
               	 Route::get('show', 'TimeTable\TimeTablController@finalResult')->name('admin.time.table.manual.button.wise.final.result');
               	 Route::post('manual-store', 'TimeTable\TimeTablController@store')->name('admin.time.table.manual.store');
               	 Route::get('manual-outo-generate', 'TimeTable\TimeTablController@outoGenerateManual')->name('admin.time.table.manual.outo.generate');
               	 Route::get('manual-delete/{id}', 'TimeTable\TimeTablController@manualDelete')->name('admin.time.table.manual.delete');

       });
           Route::group(['prefix' => 'time-table-report'], function() {
               	 Route::get('/', 'TimeTable\TimeTableReportController@index')->name('admin.time.table.report');
               	 Route::get('report', 'TimeTable\TimeTableReportController@reportFor')->name('admin.time.table.report.for');
               	 Route::get('teacher-for', 'TimeTable\TimeTableReportController@teacherFor')->name('admin.time.table.teacher.for');
               	 Route::post('show', 'TimeTable\TimeTableReportController@show')->name('admin.time.table.report.show');

       });
           Route::group(['prefix' => 'award'], function() {
               	 Route::get('/', 'AwardController@index')->name('admin.award.list');
               	 Route::get('add-form', 'AwardController@addForm')->name('admin.award.add.form');
               	 Route::post('store', 'AwardController@store')->name('admin.award.store');
               	 Route::get('table-show', 'AwardController@tableShow')->name('admin.award.table.show');
               	 Route::get('edit/{id}', 'AwardController@edit')->name('admin.award.edit');
               	 Route::get('delete/{id}', 'AwardController@destroy')->name('admin.award.delete');
               	 Route::post('update/{id}', 'AwardController@update')->name('admin.award.update');
               	 Route::get('image-show/{id}{image_id}', 'AwardController@imageShow')->name('admin.award.image.show');
               	 
       });
           Route::group(['prefix' => 'award-for'], function() {
               	 Route::get('award-for', 'AwardController@awardFor')->name('admin.award.for.list');
               	 Route::get('award-for-addform', 'AwardController@awardForAddForm')->name('admin.award.for.addform');
               	 Route::post('store', 'AwardController@awardForStore')->name('admin.award.for.store');
               	 Route::get('table-shoe', 'AwardController@awardForTableShow')->name('admin.award.for.table.show');
               	Route::get('edit/{id}', 'AwardController@awardForEdit')->name('admin.award.for.edit');
               	 Route::get('delete/{id}', 'AwardController@awardForDelete')->name('admin.award.for.delete');
               	 Route::post('update/{id}', 'AwardController@awardForUpdate')->name('admin.award.for.update');
               	 
       });
           Route::group(['prefix' => 'award-photo'], function() {
               	 Route::get('photo', 'AwardController@awardPhotoIndex')->name('admin.award.photo.list');
               	 Route::get('add-form', 'AwardController@awardPhotoAddForm')->name('admin.award.photo.add.form');
               	 Route::post('store', 'AwardController@awardPhotoStore')->name('admin.award.photo.store');
               	 Route::get('table-show', 'AwardController@awardPhotoTableShow')->name('admin.award.photo.table.show');
               	 Route::get('edit/{id}', 'AwardController@awardPhotoEdit')->name('admin.award.photo.edit');
               	 Route::post('update/{id}', 'AwardController@awardPhotoUpdate')->name('admin.award.photo.update');
               	 Route::get('delete/{id}', 'AwardController@awardPhotoDelete')->name('admin.award.photo.delete');
               	 
       });
           Route::group(['prefix' => 'teacher-appoinment'], function() {
               	 Route::get('/', 'AppointmentController@index')->name('admin.teacher.appointment');
               	 Route::get('add-form', 'AppointmentController@addForm')->name('admin.teacher.appointment.addFprm');
               	 Route::post('/', 'AppointmentController@store')->name('admin.teacher.appointment.store');
               	 Route::get('table-show', 'AppointmentController@tableShow')->name('admin.teacher.appointment.table.show');
               	 Route::get('edit/{id}', 'AppointmentController@edit')->name('admin.teacher.appointment.edit');
               	 Route::get('delete/{id}', 'AppointmentController@destroy')->name('admin.teacher.appointment.delete');
               	 Route::get('update/{id}', 'AppointmentController@update')->name('admin.teacher.appointment.update');
               	 
               	 
       });
           Route::group(['prefix' => 'lesson-plan'], function() {
               	 Route::get('/', 'LessonPlanController@index')->name('admin.teacher.lesson.plan');
               	 Route::get('add-form', 'LessonPlanController@addForm')->name('admin.teacher.lesson.plan.addFprm');
               	 Route::post('/', 'LessonPlanController@store')->name('admin.teacher.lesson.plan.store');
               	 Route::get('table-show', 'LessonPlanController@tableShow')->name('admin.teacher.lesson.plan.table.show');
               	 Route::get('edit/{id}', 'LessonPlanController@edit')->name('admin.teacher.lesson.plan.edit');
               	 Route::get('delete/{id}', 'LessonPlanController@destroy')->name('admin.teacher.lesson.plan.delete');
               	 Route::post('update/{id}', 'LessonPlanController@update')->name('admin.teacher.lesson.plan.update');

//--------------lesson-plan-follow---------------------------------------

               	 Route::get('lesson-plan-follow', 'LessonPlanController@lessonPlanFollow')->name('admin.teacher.lesson.plan.follow');
               	 Route::get('lesson-plan-follow-add', 'LessonPlanController@lessonPlanFollowAddForm')->name('admin.teacher.lesson.plan.follow.add.form');
               	 Route::post('lesson-plan-follow-store', 'LessonPlanController@lessonPlanFollowStore')->name('admin.teacher.lesson.plan.follow.store');
               	 Route::get('lesson-plan-follow-table', 'LessonPlanController@lessonPlanFollowTable')->name('admin.teacher.lesson.plan.follow.table');
               	 Route::get('lesson-plan-follow-edit/{id}', 'LessonPlanController@lessonPlanFollowEdit')->name('admin.teacher.lesson.plan.follow.edit');
               	 Route::post('lesson-plan-follow-update/{id}', 'LessonPlanController@lessonPlanFollowUpdate')->name('admin.teacher.lesson.plan.follow.update');
               	 
               	 
       });   
           Route::group(['prefix' => 'teacher-diary'], function() {
               	 Route::get('/', 'TeacherDiaryController@index')->name('admin.teacher.diary');
               	 Route::get('add-form', 'TeacherDiaryController@addForm')->name('admin.teacher.diary.add.form'); 
               	 Route::post('diary-details', 'TeacherDiaryController@diaryDetails')->name('admin.teacher.diary.details'); 
               	 Route::post('diary-details-store', 'TeacherDiaryController@diaryDetailsStore')->name('admin.teacher.diary.details.store'); 
               	 
       });
           Route::group(['prefix' => 'house'], function() {
               	 Route::get('/', 'HouseController@index')->name('admin.house.details');
               	 Route::get('add-form', 'HouseController@addForm')->name('admin.house.add.form'); 
               	 Route::post('store', 'HouseController@store')->name('admin.house.store'); 
               	Route::get('table-show', 'HouseController@tableShow')->name('admin.house.table.show'); 
               	 Route::get('edit/{id}', 'HouseController@edit')->name('admin.house.edit'); 
               	 Route::get('delete/{id}', 'HouseController@destroy')->name('admin.house.delete'); 
               	 Route::post('update/{id}', 'HouseController@update')->name('admin.house.update'); 
               	  
               	 
       });


           Route::group(['prefix' => 'genders'], function() {
               	 Route::get('gender', 'GenderController@gender')->name('admin.gender.gender'); 
               	  
               	 
       });
            
           

            

});