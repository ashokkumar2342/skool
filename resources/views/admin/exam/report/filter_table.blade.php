<table class="table">
	<thead>
		<tr>
			<th>Student Name</th>
			<th>Registration No</th>
			<th>Class/Section</th>
			<th>Test Date</th>
			<th>Subject</th>
			<th>Max Marks</th>
			<th>Marks Obt</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($classTestDetails as $classTestDetail)
		    
				<tr>
					<td>{{ $classTestDetail->students->name or ''}}</td>
					<td>{{ $classTestDetail->students->registration_no or ''}}</td>
					<td>{{ $classTestDetail->classes->name or ''}}/{{ $classTestDetail->sectionTypes->name or '' }}</td> 
                    <td>{{ $classTestDetail->test_date }}</td>
                    <td>{{ $classTestDetail->subjects->name or '' }}</td>
                    <td>{{ $classTestDetail->max_marks }}</td> 
                    <td>{{ $classTestDetail->marksobt }}</td> 
				</tr> 
		@endforeach
	</tbody>
</table>