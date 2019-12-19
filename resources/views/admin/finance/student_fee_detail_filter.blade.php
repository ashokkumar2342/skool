<div class="col-lg-3 form-group">
	<label>Section</label>
	<select name="section_id" id="section_id" select2="true" class="form-control" onchange="callAjax(this,'{{ route('admin.studentFeeDetail.filter',2) }}'+'?section_id='+$('#section_id').val()+'&class_id='+$('#class_id').val(),'student_select_box')">
		<option value="0">All</option>
		@foreach ($sections as $section)
		  <option value="{{ $section->id }}">{{ $section->name }}</option> 
		@endforeach 
	</select> 
</div