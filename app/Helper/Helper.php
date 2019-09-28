 <?php  

use App\Student;
 //get admin id
 function test(){
 	return 'test';
 }
 function getUserId(){
 	return Auth::guard('admin')->user()->id;
 }
 //get student detials
 function getStudent($student_id){
 	return Student::find($student_id);
 }
 //get student with parent detials
 function getStudentParent($student_id){
 	return Student::find($student_id);
 }
 
