<div class="col-lg-4">
<label>Subject</label>
<select name="subject_id" class="form-control">
	<option selected disabled>Select Type</option>
	@foreach ($SubjectTypes as $SubjectType)
		 <option value="{{ $SubjectType->id }}">{{ $SubjectType->name }}</option>
	@endforeach
	 
</select>
</div>