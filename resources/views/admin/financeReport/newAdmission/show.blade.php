<table class="table" id="new_admission_report"> 
	<thead>
		<tr>
			<th>Name</th>
			<th>Class</th>
			<th>Section</th>
			<th>Registration No</th>
			<th>Admission No</th>
			<th>Roll No</th>
			 
		</tr>
	</thead>
	<tbody>
		@foreach ($students as $student)
				<tr>
					<td>{{ $student->name }}</td>
					<td>{{ $student->classes->name or ''}}</td>
					<td>{{ $student->sectionTypes->name or ''}}</td>
					<td>{{ $student->registration_no }}</td>
					<td>{{ $student->admission_no }}</td>
					<td>{{ $student->roll_no }}</td>
				</tr> 
		@endforeach
	</tbody>
</table>