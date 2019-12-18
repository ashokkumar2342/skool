<table class="student_list_filter_table">
<thead id="student_list_filter">
	<tr>
		<th>Sr.No.</th>
		@if ($conditionId==1)
		 <th>Aplication No.</th>
		 @else
		 <th>Registration No.</th>
		 @endif 
		
		<th>Student Name</th> 
		<th>Action</th> 
	</tr>
</thead>
<tbody>
	@foreach ($students as $student)
	@php
		$application=App\Model\AdmissionApplication::where('student_id',$student->id)->get();
	@endphp
	<tr>
		<td>{{ ++$loop->index }}</td> 
		@if ($conditionId==1)
		<td>{{ $application->first()->id or '' }}</td>
		@else
		<td>{{ $student->registration_no or '' }}</td>
		 	 
		 @endif 
		<td>{{ $student->name or '' }}</td>
		<td>
			@if (empty($application->first()->profile_path))
			<a class="btn btn-warning btn-xs"  title="Edit Student" href="{{ route('admin.student.view',$student->id) }}" target="_blank"><i class="fa fa-edit"></i></a>
			@if ($student->student_status_id==1)
			<a class="btn btn-default btn-xs"  title="Edit Student" href="{{ route('admin.student.registration.profile.view',$student->id) }}" target="_blank"><i class="fa fa-eye"></i></a> 
			 @else	 
			<a class="btn btn-default btn-xs disabled"  title="Edit Student" href="{{ route('admin.student.registration.profile.view',$student->id) }}" target="_blank"><i class="fa fa-eye"></i></a> 
			@endif
			@else
			<a class="btn btn-warning btn-xs" disabled title="Edit Student" href="{{ route('admin.student.view',$student->id) }}" target="_blank"><i class="fa fa-edit"></i></a>
			<a class="btn btn-default btn-xs" title="Edit Student" href="{{ route('admin.student.registration.profile.view',$student->id) }}" target="_blank"><i class="fa fa-eye"></i></a>
			@endif
			
		</td>
		</tr> 
		@endforeach

	</tbody>
</table>