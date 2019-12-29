		<table class="table">
		<tr>
			<th>Application No.</th>
			<th>Student Name</th>
			<th>Marks OBT</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
         @foreach ($admissionApplications as $admissionApplication)
		@php
			$student=App\Student::where('id',$admissionApplication->student_id)->get();
		@endphp
		<tr>
						<td>{{ $admissionApplication->id }}</td>
						<td>{{ $student->first()->name or '' }}</td>
						<td>
							<input type="text" name="marks[]" value="{{ $admissionApplication->test_marks }}">
						</td>
						<td>
							<select name="status[{{ $admissionApplication->student_id }}]" class="form-control">
							<option value="6"{{ $admissionApplication->status==6?'selected':'' }}>Pass</option> 
							<option value="7"{{ $admissionApplication->status==7?'selected':'' }}>Retest</option> 
							<option value="8"{{ $admissionApplication->status==8?'selected':'' }}>Fail</option> 
						    </select>
					    </td>
					</tr> 
		@endforeach
		
	</tbody>
</table>
<div class="col-lg-12 text-center" style="margin-left: 55px">
	<input type="submit" class="btn btn-success">
	
</div>
					