<table class="table table-condensed table-responsive" id="without_image_list">
	<thead>
		<tr>
			<th>Name</th>
			<th>Registration No</th>
			<th>Admission No</th>
			<th>Class</th>
			<th>Section</th>
			 
			<th>Date of Birth</th>
			<th>Mobile No.</th>
			<th>E-mail ID</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($students as $student)
				<tr>
					<td>{{ $student->name or ''}}</td>
					<td>{{ $student->registration_no or ''}}</td>
					<td>{{ $student->admission_no or ''}}</td>
					<td>{{ $student->classes->name or ''}}</td>
					<td>{{ $student->sectionTypes->name or ''}}</td>
					<td>{{ $student->dob !=null?date('d-m-Y',strtotime($student->dob)):''}}</td>
					<td>{{ $student->addressDetails->address->primary_mobile or ''}}</td> 
					<td>{{ $student->addressDetails->address->primary_email or '' }}</td> 
				</tr> 
		@endforeach
	</tbody>
</table>