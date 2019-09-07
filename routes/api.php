<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
    
});
 
	Route::group(['prefix' => 'student'], function() {
		Route::post('imageweb/{student}/update', function(Request $request) {
			return $request->all();
		    // return response()->json($data);
		})->name('admin.student.profilepic.webupdate');
	   
	    // Route::post('imageweb/{student}/update', 'Admin/backupstudent@imageWebUpdate')->name('admin.student.profilepic.webupdate');
	          
	    // });
	});
Route::post('imageweb/{id}', 'Admin\StudentController@imageWebUpdate')->name('admin.student.profilepic.webupdate');	
// Route::post('login', 'Api\StudentController@login');	
Route::get('search-school', 'Api\StudentController@searchSchool'); 
Route::get('login', 'Api\StudentController@login');	 
Route::get('forgot-password', 'Api\StudentController@forgotPassword');	
Route::get('forgot-password/otp-verify', 'Api\StudentController@forgotPasswordOtpVerify');	
Route::get('test', function(Request $request){
 return response()->json(['ashok'=>'ashok']);
});	
 Route::group(['prefix' => 'student'], function() {
 	Route::get('details/{id}', 'Api\StudentController@index'); 
    Route::get('image/{id}', 'Api\StudentController@image'); 
    Route::post('image-upload/{id}', 'Api\StudentController@imageUpload');
    Route::get('homework/{id}', 'Api\StudentController@homework'); 
    Route::get('homework-latest/{id}', 'Api\StudentController@homeworkToday'); 
    Route::get('attendance/{id}', 'Api\StudentController@attendance'); 
    Route::get('fee/{id}', 'Api\StudentController@feeDetails'); 
    Route::get('last-fee/{id}', 'Api\StudentController@lastFee'); 
    Route::get('fee-upto/{id}', 'Api\StudentController@feeUpto'); 
    Route::get('event/{id}', 'Api\StudentController@event'); 
    Route::get('remarks/{id}', 'Api\StudentController@remarks'); 
    Route::get('quotes/{id}', 'Api\StudentController@quotes'); 
    Route::post('request-update/{id}', 'Api\StudentController@requestUpdate'); 
  
 });

 Route::group(['prefix' => 'admin'], function() {
 	Route::get('details/{id}', 'Api\AdminController@index'); 
    Route::get('image/{id}', 'Api\AdminController@image'); 
    Route::get('homework/{id}', 'Api\AdminController@homework'); 
    Route::get('homework-latest/{id}', 'Api\AdminController@homeworkToday'); 
    Route::get('attendance/{id}', 'Api\AdminController@attendance'); 
    Route::get('fee/{id}', 'Api\AdminController@feeDetails'); 
    Route::get('last-fee/{id}', 'Api\AdminController@lastFee'); 
    Route::get('fee-upto/{id}', 'Api\AdminController@feeUpto'); 
    Route::get('event/{id}', 'Api\AdminController@event'); 
    Route::get('remarks/{id}', 'Api\AdminController@remarks'); 
    Route::get('quotes/{id}', 'Api\AdminController@quotes'); 
  
 });


 
