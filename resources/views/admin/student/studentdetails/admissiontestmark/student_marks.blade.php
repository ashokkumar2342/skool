		<table class="table">
		<tr>
			<th>Application No.</th>
			<th>Student Name</th>
			<th>Marks OBT</th>
			
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
							<input type="text" name="marks[{{ $admissionApplication->student_id }}]" value="{{ $admissionApplication->test_marks }}" style="width: 100px">
						</td>
						 
					</tr> 
		@endforeach
		
	</tbody>
</table>
<div class="col-lg-12 text-center" style="margin-left: 55px">
	<input type="submit" class="btn btn-success">
	
</div>
					