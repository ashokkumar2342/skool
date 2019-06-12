<table class="table"> 
	<thead>
		<tr>
			<th>Name</th>
			<th>Class</th>
			<th>Section</th>
			<th>Subject</th>
			<th>No of Period</th>
			<th>Period Duration</th>
			 
		</tr>
	</thead>
	<tbody>

		@foreach ($teacherSubjectClasss as $teacherSubjectClass) 
				<tr>
					<td>{{ $teacherSubjectClass->teacherFaculty->name or '' }}</td>
					<td>{{ $teacherSubjectClass->classTypes->name or '' }}</td>
					<td>{{ $teacherSubjectClass->sectionTypes->name or '' }}</td>
					<td>{{ $teacherSubjectClass->subjectType->name or '' }}</td>
					<td>{{ $teacherSubjectClass->no_of_period }}</td>
					<td>{{ $teacherSubjectClass->no_of_duration }}</td>
				</tr>
		@endforeach
	</tbody>
</table>