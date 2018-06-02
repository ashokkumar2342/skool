<?php
Route::get('/', 'Auth\LoginController@index')->name('admin.home');
Route::get('login', 'Auth\LoginController@showLoginForm')->name('admin.login'); 
Route::get('admin-password/reset', 'Auth\ForgetPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin-password/reset', 'Auth\ForgetPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::get('logout', 'Auth\LoginController@logout')->name('admin.logout.get');
Route::post('login', 'Auth\LoginController@login');
 
Route::group(['middleware' => 'admin'], function() {
	Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');
	//---------------account-----------------------------------------	
	Route::prefix('account')->group(function () {
	    Route::get('form', 'AccountController@form')->name('admin.account.form');
	    Route::post('store', 'AccountController@store')->name('admin.account.post');
		Route::get('list', 'AccountController@index')->name('admin.account.list');
		Route::get('edit/{account}', 'AccountController@edit')->name('admin.account.edit');
		Route::post('update/{account}', 'AccountController@update')->name('admin.account.edit.post');
		Route::get('delete/{account}', 'AccountController@destroy')->name('admin.account.delete');
		Route::get('status/{account}', 'AccountController@status')->name('admin.account.status');	 
		Route::get('r--status/{account}', 'AccountController@rstatus')->name('admin.account.r_status');	 
		Route::get('w-status/{account}', 'AccountController@wstatus')->name('admin.account.w_status');	 
		Route::get('d-status/{account}', 'AccountController@dstatus')->name('admin.account.d_status');
		Route::get('minu/{account}', 'AccountController@minu')->name('admin.account.minu');				
		// Route::get('status/{minu}', 'AccountController@minustatus')->name('admin.minu.status'); 
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
	    Route::get('search', 'SectionTypeController@search')->name('admin.section.search');
	    Route::post('add', 'SectionTypeController@store')->name('admin.section.add');
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
	     Route::get('{student}/edit', 'StudentController@edit')->name('admin.student.edit');
	     Route::get('{student}/delete', 'StudentController@destroy')->name('admin.student.delete');
	     Route::get('{student}/profileedit', 'StudentController@profileedit')->name('admin.student.profileedit');
	     Route::get('{student}/totalfeeedit', 'StudentController@totalfeeedit')->name('admin.student.totalfeeedit');
	     Route::post('{student}/totalfeeupdate', 'StudentController@totalfeeupdate')->name('admin.student.totalfeeupdate');
	     Route::post('add', 'StudentController@store')->name('admin.student.post');
	     Route::post('{student}/update', 'StudentController@update')->name('admin.student.update');
	     Route::post('{student}/profileupdate', 'StudentController@profileupdate')->name('admin.student.profileupdate');
	     Route::post('list', 'StudentController@index')->name('admin.student.list'); 
	     Route::get('show-form', 'StudentController@showForm')->name('admin.student.show');
	     Route::get('jind', 'StudentController@jind')->name('admin.student.jind'); 
	     Route::get('{student}/password-reset', 'StudentController@passwordReset')->name('admin.student.passwordreset'); 
	     Route::get('image/{image}', 'StudentController@image')->name('admin.student.image');
	     Route::post('image/{student}/update', 'StudentController@imageUpdate')->name('admin.student.profilepic.update');
	     // Route::post('imageweb/{student}/update', 'StudentController@imageWebUpdate')->name('admin.student.profilepic.webupdate');
	     Route::get('export', 'StudentController@excelData')->name('admin.student.excel');
	     Route::get('import-view', 'StudentController@importview')->name('admin.student.excel.import');	      
	     Route::get('import-show', 'StudentController@importshow')->name('admin.student.excel.show');	      
	     Route::post('import', 'StudentController@importStudent')->name('admin.student.excel.store');	      
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
	     Route::get('search', 'ReportController@reportfilter')->name('admin.student.report.post');      
         
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
	 	   // ---------------Remarks----------------------------------------
	Route::group(['prefix' => 'Remarks'], function() {
	     Route::get('/', 'CertificateIssueRemarkController@show')->name('admin.remark.show');	 	
	     Route::post('store', 'CertificateIssueRemarkController@store')->name('admin.remark.add');
	     
	 });
	
	Route::group(['prefix' => 'homework'], function() {
	    Route::get('/', 'HomeworkController@index')->name('admin.homework.list');	 	
	    Route::post('add', 'HomeworkController@store')->name('admin.homework.post');
	    Route::delete('delete', 'HomeworkController@destroy')->name('admin.homework.delete');
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
		 });
	    Route::group(['prefix' => 'fee-structure-last-date'], function() {
	        Route::get('/', 'FeeStructureLastDateController@index')->name('admin.feeStructureLastDate.list');	 	
	        Route::post('add', 'FeeStructureLastDateController@store')->name('admin.feeStructureLastDate.post');
	        Route::delete('delete', 'FeeStructureLastDateController@destroy')->name('admin.feeStructureLastDate.delete');
	        Route::put('update', 'FeeStructureLastDateController@update')->name('admin.feeStructureLastDate.update');
	     });
	    
	    Route::group(['prefix' => 'class-fee-structure'], function() {
	        // Route::get('/', 'ClassFeeStructureController@index')->name('admin.classFeeStructure.list');	 	
	        Route::get('form', 'ClassFeeStructureController@form')->name('admin.classFeeStructureForm');	 	
	        	 	
	        Route::post('stores', 'ClassFeeStructureController@stores')->name('admin.classFeeStructure.stores');	 	
	        Route::post('add', 'ClassFeeStructureController@store')->name('admin.classFeeStructure.post');
	        Route::post('isApplicable', 'ClassFeeStructureController@isApplicable')->name('admin.classFeeStructure.isApplicable');
	        Route::delete('delete', 'ClassFeeStructureController@destroy')->name('admin.classFeeStructure.delete');
	     });
	    Route::group(['prefix' => 'fee-group'], function() {
		    Route::get('/', 'FeeGroupController@index')->name('admin.feeGroup.list');	 	
		    Route::post('add', 'FeeGroupController@store')->name('admin.feeGroup.post');
		    Route::delete('delete', 'FeeGroupController@destroy')->name('admin.feeGroup.delete');
		    Route::put('update', 'FeeGroupController@update')->name('admin.feeGroup.update');
		 });
        Route::group(['prefix' => 'fee-group-detail'], function() {
    	    Route::get('/', 'FeeGroupDetailController@index')->name('admin.feeGroupDetail.list');	 
	        Route::post('search', 'FeeGroupDetailController@search')->name('admin.feeGroupDetail.search');	 	
    	    	
    	    Route::post('add', 'FeeGroupDetailController@store')->name('admin.feeGroupDetail.post');
    	    Route::delete('delete', 'FeeGroupDetailController@destroy')->name('admin.feeGroupDetail.delete');
    	    Route::put('update', 'FeeGroupDetailController@update')->name('admin.feeGroupDetail.update');
    	 });
        Route::group(['prefix' => 'concession'], function() {
    	    Route::get('/', 'ConcessionController@index')->name('admin.concession.list');	 	
    	    Route::post('add', 'ConcessionController@store')->name('admin.concession.post');
    	    Route::delete('delete', 'ConcessionController@destroy')->name('admin.concession.delete');
    	    Route::put('update', 'ConcessionController@update')->name('admin.concession.update');
    	 });
        Route::group(['prefix' => 'student-fee-detail'], function() {
    	    Route::get('/', 'StudentFeeDetailController@index')->name('admin.studentFeeDetail.list');	 	
    	    Route::post('add', 'StudentFeeDetailController@store')->name('admin.studentFeeDetail.post');
    	    Route::delete('delete', 'StudentFeeDetailController@destroy')->name('admin.studentFeeDetail.delete');
    	    Route::put('update', 'StudentFeeDetailController@update')->name('admin.studentFeeDetail.update');
    	 });
 });

});