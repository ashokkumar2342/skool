<?php
 
Route::get('/', 'Auth\LoginController@index')->name('admin.home');
Route::get('login', 'Auth\LoginController@showLoginForm')->name('admin.login'); 
Route::get('admin-password/reset', 'Auth\ForgetPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin-password/reset', 'Auth\ForgetPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::get('logout', 'Auth\LoginController@logout')->name('admin.logout.get');
Route::post('login', 'Auth\LoginController@login');
 
Route::group(['middleware' => 'admin'], function() {
	Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard'); 
	Route::get('show-details', 'DashboardController@showStudentDetails')->name('admin.student.show.details');
	Route::get('registration-show-details', 'DashboardController@showStudentRegistrationDetails')->name('admin.student.Registration.details');
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
						
		// Route::get('status/{minu}', 'AccountController@minustatus')->name('admin.minu.status'); 
	});
	//---------------master-----------------------------------------	
	Route::prefix('master-minu')->group(function () {
		Route::prefix('academic-year')->group(function () {
		    Route::get('list', 'AcademicYearController@index')->name('admin.academicYear.list');
		    Route::post('store', 'AcademicYearController@store')->name('admin.academicYear.store');
		    Route::get('edit/{id}', 'AcademicYearController@edit')->name('admin.academicYear.edit');
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
		     
		});
	 
	     
	});
		//---------------minu-----------------------------------------	
	Route::prefix('minu')->group(function () {
	    
		Route::get('status/{minu}', 'MinuController@status')->name('admin.minu.status');	 
		Route::get('r--status/{minu}', 'MinuController@rstatus')->name('admin.minu.r_status');	 
		Route::get('w-status/{minu}', 'MinuController@wstatus')->name('admin.minu.w_status');	 
		Route::get('d-status/{minu}', 'MinuController@dstatus')->name('admin.minu.d_status');
		Route::get('minu/{minu}', 'MinuController@minu')->name('admin.minu.minu');	 
	});
	//---------------Class create----------------------------------------
	Route::group(['prefix' => 'class'], function() {
	    Route::get('/', 'ClassTypeController@index')->name('admin.class.list');
	    Route::get('search', 'ClassTypeController@search')->name('admin.class.search');
	    Route::post('add', 'ClassTypeController@store')->name('admin.class.add');
	    Route::get('{classType}/edit', 'ClassTypeController@edit')->name('admin.class.edit');
	    Route::post('{classType}/update', 'ClassTypeController@update')->name('admin.class.update');
	    Route::get('{classType}/delete', 'ClassTypeController@destroy')->name('admin.class.delete');
	});
		//---------------Section Type create----------------------------------------
	Route::group(['prefix' => 'section'], function() {
	    Route::get('/', 'SectionTypeController@index')->name('admin.section.list');
	    Route::get('select', 'SectionTypeController@selectList')->name('admin.section.selectList');
	    Route::get('search', 'SectionTypeController@search')->name('admin.section.search');
	    Route::post('add', 'SectionTypeController@store')->name('admin.sectionType.add');
	    Route::get('{sectionType}/edit', 'SectionTypeController@edit')->name('admin.section.edit');
	    Route::post('{sectionType}/update', 'SectionTypeController@update')->name('admin.section.update');
	    Route::get('{sectionType}/delete', 'SectionTypeController@destroy')->name('admin.section.delete');

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
	     Route::get('{student}/edit', 'StudentController@edit')->name('admin.student.edit');
	     Route::get('{student}/delete', 'StudentController@destroy')->name('admin.student.delete');
	     Route::get('{student}/profileedit', 'StudentController@profileedit')->name('admin.student.profileedit');
	     Route::get('{student}/totalfeeedit', 'StudentController@totalfeeedit')->name('admin.student.totalfeeedit');
	     Route::post('{student}/totalfeeupdate', 'StudentController@totalfeeupdate')->name('admin.student.totalfeeupdate');
	     Route::post('add', 'StudentController@store')->name('admin.student.post');
	     Route::post('{student}/update', 'StudentController@update')->name('admin.student.update');
	     Route::post('{student}/view-update', 'StudentController@viewUpdate')->name('admin.student.view-update');
	     Route::post('{student}/profileupdate', 'StudentController@profileupdate')->name('admin.student.profileupdate');
	     Route::post('list', 'StudentController@index')->name('admin.student.list'); 
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
	     Route::post('birthday-card-all', 'StudentController@birthdayPrintAll')->name('admin.birthday.card.pdfAll');   
	     Route::post('import', 'StudentController@importStudent')->name('admin.student.excel.store');	      
	     
		 Route::get('new-admission', 'StudentController@newAdmission')->name('admin.student.new.adminssion');
		 Route::get('new-admission-status-change/{id}', 'StudentController@newAdmissionStatusChange')->name('admin.new.student.status.change');
		 Route::get('reset-admission', 'StudentController@resetAdmission')->name('admin.student.reset.adminssion');
		 Route::post('reset-admission-student-show', 'StudentController@resetAdmissionStudentShow')->name('admin.student.reset.adminssion.student.show');	      
		 
		Route::get('reset-roll-no', 'StudentController@resetRollNo')->name('admin.student.reset.roll');
		Route::post('reset-roll-no-show', 'StudentController@resetRollNoshow')->name('admin.student.reset.roll.no.show');
		Route::post('reset-roll-no-show-update', 'StudentController@resetRollNoshowUpdate')->name('admin.student.reset.roll.no.show.update');
		Route::post('reset-roll-no-update', 'StudentController@resetRollNoUpdate')->name('admin.student.reset.roll.no.update');


		});

	 	// ---------------Default Value----------------------------------------
	 Route::group(['prefix' => 'default-Value'], function() {
	    Route::get('/', 'StudentDefaultValueController@index')->name('admin.defaultValue.list');
	    Route::post('add', 'StudentDefaultValueController@store')->name('admin.defaultValue.post');
	    
	 });
	 // ---------------Parents Info----------------------------------------
	 Route::group(['prefix' => 'parents-info'], function() {
	    Route::post('Parents-add', 'ParentInfoController@store')->name('admin.parents.add');
	    Route::delete('delete', 'ParentInfoController@destroy')->name('admin.parents.delete');
	    Route::get('edit', 'ParentInfoController@edit')->name('admin.parents.edit');
	    Route::post('image', 'ParentInfoController@image')->name('admin.parents.image');
	    Route::get('image/{image}', 'ParentInfoController@imageShow')->name('admin.parents.image.show');
	    Route::post('update', 'ParentInfoController@update')->name('admin.parents.update');
	 });
	  	// ---------------Medical Info----------------------------------------
	 Route::group(['prefix' => 'medical-info'], function() {
	    Route::post('add', 'StudentMedicalInfoController@store')->name('admin.medical.add');
	    Route::delete('delete', 'StudentMedicalInfoController@destroy')->name('admin.medical.delete');
	    Route::get('edit', 'StudentMedicalInfoController@edit')->name('admin.medical.edit');
	    Route::post('update', 'StudentMedicalInfoController@update')->name('admin.medical.update');
	 }); 
	   	// ---------------Sibling Info----------------------------------------
	 Route::group(['prefix' => 'sibling-info'], function() {
	    Route::get('show/{student}', 'StudentSiblingInfoController@show')->name('admin.sibling.show');
	    Route::post('add/{student}', 'StudentSiblingInfoController@store')->name('admin.sibling.add');
	    Route::delete('delete', 'StudentSiblingInfoController@destroy')->name('admin.sibling.delete');
	    Route::get('edit', 'StudentSiblingInfoController@edit')->name('admin.sibling.edit');
	    Route::post('update', 'StudentSiblingInfoController@update')->name('admin.sibling.update');
	 });
	  Route::group(['prefix' => 'student-subject'], function() {
	    Route::post('add', 'StudentSubjectController@store')->name('admin.studentSubject.add');
	    Route::delete('delete', 'StudentSubjectController@destroy')->name('admin.studentSubject.delete');
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
	         
	 	}); 
  
	 	// ---------------Subject----------------------------------------
	 	Route::group(['prefix' => 'subject'], function() {
	 	    Route::get('/', 'SubjectController@index')->name('admin.subject.manageSubject');
	 	    Route::get('search', 'SubjectController@search')->name('admin.subject.search');
	 	    Route::post('add', 'SubjectController@store')->name('admin.subject.add');
	 	    Route::get('{manageSubjectEdit}/edit', 'SubjectController@edit')->name('admin.manageSubject.edit');
	 	    Route::post('{manageSubject}/update', 'SubjectController@update')->name('admin.manageSubject.update');
	 	    Route::get('{manageSubject}/delete', 'SubjectController@destroy')->name('admin.manageSubject.delete');        
	 	});
	 // ---------------Subject----------------------------------------
	 Route::group(['prefix' => 'activity'], function() {
	     Route::get('/', 'ActivityController@index')->name('admin.activity.list');
	     Route::get('delete/{activity}', 'ActivityController@destroy')->name('admin.activity.delete');
         
	 });
	  // ---------------Report----------------------------------------
	 Route::group(['prefix' => 'report'], function() {
	     Route::get('/', 'ReportController@index')->name('admin.student.report');
	     Route::post('search', 'ReportController@reportfilter')->name('admin.student.report.post');      
         
	 });
	   // ---------------Certificate----------------------------------------
	 Route::group(['prefix' => 'certificate'], function() {
	     Route::get('/', 'CertificateIssueDetailController@index')->name('admin.student.certificateIssu.list');	 	
	     Route::get('show', 'CertificateIssueDetailController@create')->name('admin.student.certificateIssu.apply');
	     Route::get('print/{certificate}', 'CertificateIssueDetailController@print')->name('admin.student.certificateIssu.print');
	     Route::post('store', 'CertificateIssueDetailController@store')->name('admin.student.certificateIssu.post');
	     Route::get('edit', 'CertificateIssueDetailController@edit')->name('admin.student.certificateIssu.edit');
	     Route::get('show/{certificate}', 'CertificateIssueDetailController@show')->name('admin.student.certificateIssu.show');
	     Route::get('delete', 'CertificateIssueDetailController@edit')->name('admin.student.certificateIssu.delete');
	     Route::get('download/{certificate}', 'CertificateIssueDetailController@download')->name('admin.student.attachment.download');
	     Route::get('verify/{certificate}', 'CertificateIssueDetailController@verify')->name('admin.student.attachment.virify');
	     Route::get('approval/{certificate}', 'CertificateIssueDetailController@approval')->name('admin.student.attachment.approval');
	 });
	   // ---------------Tuition Fee Certificate----------------------------------------
	 Route::group(['prefix' => 'certificate-tuition'], function() {
	     Route::get('/', 'CertificateIssueDetailController@tuitionFeeShowForm')->name('admin.student.certificateIssu.tuition');	 
	     Route::get('result', 'CertificateIssueDetailController@tuitionFeeShowResult')->name('admin.student.certificateIssu.tuition.result');	 	
	     Route::get('show/{id}', 'CertificateIssueDetailController@tuitionPrint')->name('admin.student.certificateIssu.tuition.print');
	     // Route::post('store', 'CertificateIssueDetailController@store')->name('admin.student.certificateIssu.post');
	     // Route::get('edit', 'CertificateIssueDetailController@edit')->name('admin.student.certificateIssu.edit');
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
	    Route::delete('delete', 'HomeworkController@destroy')->name('admin.homework.delete');
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
	    });
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
    	    Route::post('assign/show', 'StudentFeeDetailController@feeassignshow')->name('admin.studentFeeAssign.show');
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
			 });
		});
		Route::group(['prefix' => 'exam'], function() {	
			  //------------------------- Exam Test ---------------------------------
			Route::group(['prefix' => 'class-test'], function() {
			    Route::get('/', 'Exam\ClassTestController@index')->name('admin.exam.test');	 	
			    Route::post('store', 'Exam\ClassTestController@store')->name('admin.exam.classtest.store');	 	
			    Route::get('delete/{id}', 'Exam\ClassTestController@destroy')->name('admin.exam.classtest.delete');	 	
			    
			 });
			   //------------------------- Exam Test Details ---------------------------------
			Route::group(['prefix' => 'class-detail'], function() {
			    Route::get('/', 'Exam\ClassTestDetailController@index')->name('admin.exam.test.details');	 	
			    Route::post('store', 'Exam\ClassTestDetailController@store')->name('admin.exam.classdetail.store');	
			    Route::get('delete/{id}', 'Exam\ClassTestDetailController@destroy')->name('admin.exam.classdetail.delete');	 	
			    Route::get('search', 'Exam\ClassTestDetailController@searchStudent')->name('admin.classdetail.studentSearch');	 	
			    
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
			 });
			  //------------------------- Exam marks details ---------------------------------
			Route::group(['prefix' => 'exam-marks-details'], function() {
			    Route::get('/', 'Exam\MarkDetailController@index')->name('admin.exam.mark.detail');	 	
			    Route::post('store', 'Exam\MarkDetailController@store')->name('admin.exam.mark.detail.store');	 	
			    Route::get('delete/{id}', 'Exam\MarkDetailController@destroy')->name('admin.exam.mark.detail.delete');
			    Route::get('search', 'Exam\MarkDetailController@searchStudent')->name('admin.mark.detail.studentSearch');
			 });
			  //------------------------- Exam marks details ---------------------------------
			Route::group(['prefix' => 'grade-details'], function() {
			    Route::get('/', 'Exam\GradeDetailController@index')->name('admin.exam.grade.detail');	 	
			    Route::post('store', 'Exam\GradeDetailController@store')->name('admin.exam.grade.detail.store');	 	
			    Route::get('delete/{id}', 'Exam\GradeDetailController@destroy')->name('admin.exam.mark.grade.delete');
			 });
			   //------------------------- Income ---------------------------------
			Route::group(['prefix' => 'incomeSlab'], function() {
			    Route::get('/', 'MasterController@incomeSlab')->name('admin.incomeSlab.list');	 	
			    Route::post('store', 'MasterController@incomeSlabStore')->name('admin.incomeSlab.store'); });
			    Route::get('edit/{id}', 'MasterController@incomeSlabEdit')->name('admin.incomeSlab.edit');
			    Route::post('update/{id}', 'MasterController@incomeSlabUpdate')->name('admin.incomeSlab.update');
			    Route::get('delete/{id}', 'MasterController@incomeSlabDestroy')->name('admin.incomeSlab.delete');

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

			});	

});