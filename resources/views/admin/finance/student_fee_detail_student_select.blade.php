<div class="col-lg-3 form-group">
	<label>Student</label>
	<select name="student_id" class="form-control select2">
		<option value="0">All</option>
		@foreach ($students as $student)
		  <option value="{{ $student->id }}">{{ $student->registration_no }}--{{ $student->name }}</option> 
		@endforeach 
	</select> 
</div