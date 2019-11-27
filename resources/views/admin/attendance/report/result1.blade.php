<table class="table table-striped table-bordered table-hover" id="attendance_result_table">
	<thead>
	       <tr>
			<td></td>
			<td></td>
			<td><b>{{ date('d-m-Y',strtotime($date)) }}</b></td>
			<td></td>
			<td></td>
			<td></td>
		</tr> 
		<tr> 
			<th>Class/Section</th>
			<th>Total Student</th>
			<th>Present</th>
			<th>Absent</th>
			<th>Leave</th>
			<th>Present %</th> 
		</tr>
	</thead>
	<tbody> 
		@foreach ($attendanceClass as $section) 
		         @php
		         	$students=App\Student::where('class_id',$section->class_id)->where('section_id',$section->section_id)->count('id');
		         	$pstudents=App\Model\StudentAttendance::whereIn('student_id',$student)->where('attendance_type_id',1)->count('student_id');
		         	$Astudents=App\Model\StudentAttendance::whereIn('student_id',$student)->where('attendance_type_id',2)->count('student_id');
		         	$Lstudents=App\Model\StudentAttendance::whereIn('student_id',$student)->where('attendance_type_id',3)->count('student_id');
		         
			           $max =$students;
                       $marObt =$pstudents+$Lstudents;
                       $percentile=($marObt/$max)*100; 
		         @endphp
			         
					        <tr> 
								<td>{{ $section->classes->name or '' }}/{{ $section->sectionTypes->name or '' }}</td> 
								<td> {{ $students }}</td> 
								<td> {{ $pstudents }}</td> 
								<td> {{ $Astudents }}</td> 
								<td> {{ $Lstudents }}</td> 
								<td> {{ $percentile}}</td> 
							</tr>
			         
				 
		@endforeach
		 
	</tbody>
</table>
{{-- <div class="row" style="margin-top: 5px">
	<div class="col-lg-2" > 
      Total Student :
     <span style="margin-top: 20px"><b>{{ $arrayId ++ -1 }}</b></span>
    </div><div class="col-lg-2" > 
       Present :
     <span style="margin-top: 20px"><b> </b></span>
    </div><div class="col-lg-2" > 
       Absent :
     <span style="margin-top: 20px"><b>{{ $arrayId ++ -1 }}</b></span>
    </div><div class="col-lg-2" > 
       Leave :
     <span style="margin-top: 20px"><b>{{ $arrayId ++ -1 }}</b></span>
    </div><div class="col-lg-2" > 
       Present % :
     <span style="margin-top: 20px"><b>{{ $arrayId ++ -1 }}</b></span>
    </div>
</div> --}}
 