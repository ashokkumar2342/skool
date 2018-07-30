 <?php  
use App\Model\StudentAttendance;
// Total count Presrnt student
function presentStudent(){
	$date = date('Y-m-d');
	$present = StudentAttendance::where('attendance_type_id',1)
				->Where('date',$date)
				->OrWhere('attendance_type_id',3)
				->OrWhere('attendance_type_id',4)
				
				->count();
	return $present;
}
// Total count absent student
function absentStudent(){
	$date = date('Y-m-d');
	$absent = StudentAttendance::where('attendance_type_id',2) 
			->Where('date',$date)
			->count();
	return $absent;
}

// Total count absent student
function totalStudent(){
	$date = date('Y-m-d');
	$students = App\Student::where('status',1)->count(); 
	return $students;
}
// Total count absent student
function userId(){
	 return Auth::guard('admin')->user()->id;
}