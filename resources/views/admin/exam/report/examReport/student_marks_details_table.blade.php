 <form action="{{ route('admin.exam.exam.report.print') }}" method="get" target="blank">
 {{ csrf_field() }}	
 
<table class="table" id="class_test_show_table_id">
	<thead>
		<tr>
			<th>Student Name</th>
			<th>Registration No</th>
			<th>Class</th> 
			<th>Ondate</th>
			<th>Subject</th>
			<th>Max Marks</th>
			<th>Marks Obt</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($markDetails as $markDetail)
		    
				<tr>
					<input type="text" hidden="" name="class_test_details_id[]" value="{{ $markDetail->id }}">
		            <input type="text" hidden="" name="class_test_id[]" value="{{ $markDetail->class_test_id }}">
		            <input type="text" hidden="" name="student_id[]" value="{{ $markDetail->student_id }}">
					<td>{{ $markDetail->students->name or ''}}</td>
					<td>{{ $markDetail->students->registration_no or ''}}</td>
					<td>{{ $markDetail->classes->name or ''}}</td> 
                    <td>{{ $markDetail->on_date }}</td>
                    <td>{{ $markDetail->subjects->name or '' }}</td>
                    <td>{{ $markDetail->max_marks }}</td> 
                    <td>{{ $markDetail->marksobt }}</td> 
				</tr> 
		@endforeach
	</tbody>
</table>
<div class="col-lg-12 text-center">
	
<input type="submit" value="Print" target="blank" class="btn btn-success">
</div>
</form>