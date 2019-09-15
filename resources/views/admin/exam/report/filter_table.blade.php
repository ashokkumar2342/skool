 <form action="{{ route('admin.exam.report.print') }}" method="get" target="blank">
 {{ csrf_field() }}	
 
<table class="table" id="class_test_show_table_id">
	<thead>
		<tr>
			<th>Student Name</th>
			<th>Registration No</th>
			<th>Class/Section</th>
			<th>Test Date</th>
			<th>Subject</th>
			<th>Max Marks</th>
			<th>Marks Obt</th>
			<th>Grade</th>
			<th>Rank</th>
			<th>Percentile</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($classTestDetails as $classTestDetail)
		    
				<tr>
					<input type="text" hidden="" name="class_test_details_id[]" value="{{ $classTestDetail->id }}">
		            <input type="text" hidden="" name="class_test_id[]" value="{{ $classTestDetail->class_test_id }}">
		            <input type="text" hidden="" name="student_id[]" value="{{ $classTestDetail->student_id }}">
					<td>{{ $classTestDetail->students->name or ''}}</td>
					<td>{{ $classTestDetail->students->registration_no or ''}}</td>
					<td>{{ $classTestDetail->classes->name or ''}}/{{ $classTestDetail->sectionTypes->name or '' }}</td> 
                    <td>{{ $classTestDetail->test_date }}</td>
                    <input type="text" hidden="" name="subject_id[]" value="{{ $classTestDetail->subject_id }}">
                    <input type="text" hidden="" name="class_id[]" value="{{ $classTestDetail->class_id }}">
                    <input type="text" hidden="" name="section_id[]" value="{{ $classTestDetail->section_id }}">
                    <td>{{ $classTestDetail->subjects->name or '' }}</td>
                    <td>{{ $classTestDetail->max_marks }}</td> 
                    <td>{{ $classTestDetail->marksobt }}</td>
                    <td>{{ $classTestDetail->grade_short or ''}}</td>
                    <td>{{ $classTestDetail->rank or ''}}</td>
                    <td>{{ $classTestDetail->percentile or ''}}</td> 
				</tr> 
		@endforeach
	</tbody>
</table>
<div class="col-lg-12 text-center">
	
<input type="submit" value="Print" target="blank" class="btn btn-success">
</div>
</form>