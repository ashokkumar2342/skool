 
	<div class="col-lg-5">
		
	
<div class="panel panel-default">
  <div class="panel-heading">Teacher Details</div>
  <div class="panel-body">
  	<table class="table "> 
	<thead>
		<tr>
			 
			<th class="text-nowrap">Class/Section</th> 
			<th>Subject</th>
			<th class="text-nowrap">No of Period</th>
			<th class="text-nowrap">Period Duration</th>
			<th>Total</th>
			 
			 
			 
		</tr>
	</thead>
	<tbody>
    	@php
    		$total =0;
    	@endphp
		@foreach ($teacherSubjectClasss as $teacherSubjectClass) 
				<tr>
					{{-- <td>{{ $teacherSubjectClass->teacherFaculty->name or '' }}</td> --}}
					<td>{{ $teacherSubjectClass->classTypes->name or '' }}/{{ $teacherSubjectClass->sectionTypes->name or '' }}</td>
					 
					<td>{{ $teacherSubjectClass->subjectType->name or '' }}</td>
					<td>{{ $teacherSubjectClass->no_of_period or ''}}</td>
					<td>
						@php
							 $period=App\Model\TimeTable\ClassSubjectPeriod::where('class_id',$teacherSubjectClass->class_id)->where('section_id',$teacherSubjectClass->section_id)->first(); 
						@endphp
                            {{ $period->period_duration or ''}}

					</td>
				     <td>
				     	{{ $teacherSubjectClass->no_of_period * $period->period_duration }}
				     	@php
				     		$total +=$teacherSubjectClass->no_of_period * $period->period_duration;
				     	@endphp
			        </td>
					 
					 
				</tr>
				
		@endforeach
		<tr>
			  <td> </td>
			  <td> </td>
			  <td> </td>
			  <td> </td>
			 
			  
   
		 {{-- <td><h4><b>Total : {{ $teacherSubjectClasss->sum('no_of_period') }}</b></h4></td> --}}
		 <td><h4><b>Total :{{ $total }} </b></h4></td>
		 
		</tr>

	</tbody>
</table>
  </div>

</div>

</div>


	
 