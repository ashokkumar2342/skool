<div class="col-lg-6">
		
	
<div class="panel panel-default">
  <div class="panel-heading">Subject Wise Teacher Details</div>
  <div class="panel-body">
  	<table class="table "> 
	<thead>
		<tr>
			 
			<th>Teacher Name</th>
			<th>Class</th>
			<th>Section</th>
			<th>Subject</th>
			<th>No of Period</th>
			<th>Period Duration</th>
			 
			 
			 
			 
		</tr>
	</thead>
	<tbody>
    	 
		@foreach ($teacherWiseSubjectClassSaveperiod as $teacherWiseSubjectClassSaveperio) 
				<tr>
					 
					<td>{{ $teacherWiseSubjectClassSaveperio->teacherFaculty->name or '' }}</td>
					<td>{{ $teacherWiseSubjectClassSaveperio->classTypes->name or '' }}</td>
					<td>{{ $teacherWiseSubjectClassSaveperio->sectionTypes->name or '' }}</td>
					<td>{{ $teacherWiseSubjectClassSaveperio->subjectType->name or '' }}</td>
					<td>{{ $teacherWiseSubjectClassSaveperio->no_of_period or ''}}</td>
					<td> 
					@php
							 $period=App\Model\TimeTable\ClassSubjectPeriod::where('class_id',$teacherWiseSubjectClassSaveperio->class_id)->where('section_id',$teacherWiseSubjectClassSaveperio->section_id)->first(); 
						@endphp
                            {{ $period->period_duration or ''}}

                        </td>
					 
					 
					 
				</tr>
				
		@endforeach
		<tr>
			  <td> </td>
			  
		</tr>

	</tbody>
</table>
  </div>

</div>

</div>