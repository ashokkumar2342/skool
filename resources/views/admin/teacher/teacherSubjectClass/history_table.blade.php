<div class="col-lg-12">
<table class="table" id="data_table"> 
	<thead>
		<tr>
			<th>Name</th>
			<th>Class</th>
			<th>Section</th>
			<th>Subject</th>
			<th>No of Period</th>
			 
			 
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
					 
					 
				</tr>
		@endforeach

	</tbody>
</table>
<div class="col-lg-2 pull-right" style="margin-right: 150px"> 
	<label>Total</label>
<input type="text" class="form-control">
</div>