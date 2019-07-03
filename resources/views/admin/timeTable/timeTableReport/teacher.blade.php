<div class="col-lg-4">
<label>Teacher</label>
<select name="teacher_id" class="form-control">
	<option selected disabled>Select Teacher</option>
	@foreach ($teachers as $teacher)
		 <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
	@endforeach
	 
</select>
</div>