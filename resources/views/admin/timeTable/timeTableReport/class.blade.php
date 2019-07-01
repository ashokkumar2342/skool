<div class="col-lg-4">
<label>Class</label>
<select name="class_id" class="form-control">
	<option selected disabled>Select class</option>
	@foreach ($classTypes as $classType)
		 <option value="{{ $classType->id }}">{{ $classType->name }}</option>
	@endforeach
	 
</select>
</div>