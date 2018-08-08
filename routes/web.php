<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('front.home');
});
Route::prefix('resitration')->group(function () {
    Route::get('form', 'Front\ParentRegistrationController@firststep')->name('student.resitration.firststep');
     Route::post('form', 'Front\ParentRegistrationController@store')->name('student.resitration.firststep.store');
     Route::get('verification/{id}', 'Front\ParentRegistrationController@verification')->name('student.resitration.verification');
     Route::post('mobile-verify', 'Front\ParentRegistrationController@verifyMobile')->name('student.resitration.verifyMobile');
     Route::post('email-verify', 'Front\ParentRegistrationController@verifyEmail')->name('student.resitration.verifyEmail');

    
	  
});
// Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');


// facebook
Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');
//google
Route::get('login/google', 'Auth\LoginController@googleredirectToProvider');
Route::get('login/google/callback', 'Auth\LoginController@googlehandleProviderCallback');

