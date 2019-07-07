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
Route::get('login', 'Api\StudentController@login');	
Route::get('test', function(Request $request){
 return response()->json(['ashok'=>'ashok']);
});	
 Route::group(['prefix' => 'student'], function() {
 	Route::get('details/{id}', 'Api\StudentController@index'); 
    Route::get('image/{id}', 'Api\StudentController@image'); 
    Route::get('homework/{id}', 'Api\StudentController@homework'); 
    Route::get('homework-latest/{id}', 'Api\StudentController@homeworkToday'); 
    Route::get('attendance/{id}', 'Api\StudentController@attendance'); 
    Route::get('fee/{id}', 'Api\StudentController@feeDetails'); 
    Route::get('last-fee/{id}', 'Api\StudentController@lastFee'); 
    Route::get('fee-upto/{id}', 'Api\StudentController@feeUpto'); 
  
 });


 
