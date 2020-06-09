<?php
use App\Helper\MyFuncs;
 
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
Route::get('/func', function () {
    return MyFuncs::full_name("John","Doe");
});
 
Route::get('/', function () {
    return view('front.home');
 
});
Route::get('try-demo', 'TryDemoController@index')->name('try.demo');
Route::post('try-demo', 'TryDemoController@store')->name('try.demo.store');
Route::get('barcode', 'BarcodeController@barcodeShow');
Route::post('barcode-generate', 'BarcodeController@barcode')->name('barcode.generate');
 
Route::prefix('question')->group(function () {
    Route::get('/', 'QuestionController@questionForm')->name('question.form'); 
    Route::post('form-store', 'QuestionController@questionStore')->name('question.store'); 
    Route::get('report', 'QuestionController@Report1')->name('question.report'); 
    Route::get('report2', 'QuestionController@Report2')->name('question.report2'); 
    Route::get('delete/{id}', 'QuestionController@destroy')->name('question.delete'); 
});
 
Route::prefix('parent')->group(function () {
    Route::get('login', 'Front\ParentRegistrationController@login')->name('parent.login.form'); 
});
// Route::prefix('resitration')->group(function () {
//     Route::get('form', 'Front\ParentRegistrationController@firststep')->name('student.resitration.firststep');
//      Route::post('form', 'Front\ParentRegistrationController@store')->name('student.resitration.firststep.store');
//      Route::get('verification/{id}', 'Front\ParentRegistrationController@verification')->name('student.resitration.verification');
//      Route::post('mobile-verify', 'Front\ParentRegistrationController@verifyMobile')->name('student.resitration.verifyMobile');
//      Route::post('email-verify', 'Front\ParentRegistrationController@verifyEmail')->name('student.resitration.verifyEmail');
//      Route::get('resitration-form', 'Front\ParentRegistrationController@resitrationForm')->name('student.resitration.resitrationForm'); 
//  Route::get('resitration-form1', 'Front\ParentRegistrationController@resitrationForm')->name('student.resitration.resitrationForm'); 
// });
Auth::routes();
Route::get('resitration-form/{id}', 'Front\ParentRegistrationController@resitrationForm')->name('student.resitration.resitrationForm'); 
Route::get('/home', 'HomeController@index')->name('home'); 
Route::post('/student', 'Front\ParentRegistrationController@student')->name('student');
Route::post('/previous-school', 'Front\ParentRegistrationController@previousSchool')->name('previous.school');
Route::post('/address', 'Front\ParentRegistrationController@address')->name('address');
Route::post('/father', 'Front\ParentRegistrationController@father')->name('father');
Route::post('/mother', 'Front\ParentRegistrationController@mother')->name('mother');
Route::post('/guardian', 'Front\ParentRegistrationController@guardian')->name('guardian');
Route::post('/sibling', 'Front\ParentRegistrationController@sibling')->name('sibling');
Route::post('/career', 'Front\ParentRegistrationController@career')->name('career');
Route::post('/other', 'Front\ParentRegistrationController@other')->name('other');
Route::post('/document', 'Front\ParentRegistrationController@document')->name('document');
Route::post('/declaration', 'Front\ParentRegistrationController@declaration')->name('declaration');
Route::get('/preivew/{id}', 'Front\ParentRegistrationController@preview')->name('preview');
Route::get('/download/{id}', 'Front\ParentRegistrationController@previewDownload')->name('preview.download');
Route::group(['prefix' => 'payment'], function() {
   Route::get('/form', 'Front\PaymentController@index')->name('payment.form');  
   Route::post('payment-store', 'Front\PaymentController@store')->name('payment.store');  
   Route::post('/paytm-callback', 'Front\PaymentController@paytmCallback');
});
 
 
// facebook
Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');
//google
Route::get('login/google', 'Auth\LoginController@googleredirectToProvider');
Route::get('login/google/callback', 'Auth\LoginController@googlehandleProviderCallback');

Route::get('inbox', 'HomeController@inbox');

