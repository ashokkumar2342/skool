<table class="table">
	<thead>
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
							<input type="text" name="marks[]">
						</td>
						<td>
							<select name="status[{{ $admissionApplication->student_id }}]" class="form-control">
							<option value="6">Pass</option> 
							<option value="7">Retest</option> 
							<option value="8">Fail</option> 
						    </select>
					    </td>
					</tr> 
		@endforeach
	</tbody>
</table>
<div class="col-lg-9 text-right" style="margin-left: 55px">
	<input type="submit" class="btn btn-success">
	
</div>