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
		@foreach ($sections as $section) 
		         @php
                     $students=App\Student::where('class_id',$section->class_id)->where('section_id',$section->section_id)->count('id'); 
                     $studentArryId=App\Student::where('class_id',$section->class_id)->where('section_id',$section->section_id)->pluck('id')->toArray(); 
		         	 
		         	$Pstudents=App\Model\StudentAttendance::whereIn('student_id',$studentArryId)->where('attendance_type_id',1)->whereDate('date',$date)->count('student_id');
		         	$Astudents=App\Model\StudentAttendance::whereIn('student_id',$studentArryId)->whereDate('date',$date)->where('attendance_type_id',2)->count('student_id');
		         	$Lstudents=App\Model\StudentAttendance::whereIn('student_id',$studentArryId)->whereDate('date',$date)->where('attendance_type_id',3)->count('student_id');
		         	 if ($students!=0){  
			           $max =$students; 
                       $marObt =$Pstudents+$Lstudents;
                       $percentile=($marObt/$max)*100; 
                       $precent=number_format( $percentile, 1 );
                       }   
		         	 if ($students==0){  
			           $precent=0; 
		         	 } 
		         @endphp 
					        <tr> 
								<td>{{ $section->classes->name or '' }}/{{ $section->sectionTypes->name or '' }}</td> 
								<td>{{ $students or ''}}</td> 
								<td>{{ $Pstudents or ''}}</td> 
								<td>{{ $Astudents or ''}}</td> 
								<td>{{ $Lstudents or ''}}</td> 
								<td>{{ $precent or ''}} %</td> 
								 
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
 